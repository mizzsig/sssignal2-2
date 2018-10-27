<?php

namespace App\Http\Controllers;

use App\Jobs\sendCommentMail;
use App\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ColumnCommentController extends Controller
{
    // route 'api/comment/{type}/{url}'
    // 指定した記事に付いている全てのコメントを取得する
    static function get($type = '', $url = '') {
        $post = Post::where('type', $type)->where('url', $url)->first();

        if (!isset($post) || !isset($post['comments']) || !is_array($post['comments'])) {
            return [];
        }

        // Postクラスは直接編集できないため移す
        $result = $post['comments'];

        // ユーザ情報は表に出さない！
        foreach ($result as $index => $comment) {
            if (isset($result[$index]['remote_addr'])) {
                unset($result[$index]['remote_addr']);
            }
            if (isset($result[$index]['user_agent'])) {
                unset($result[$index]['user_agent']);
            }
        }

        return $result;
    }

    // route 'api/comment/{type}/{url}'
    // 指定した記事にコメントを追加する
    static function put($type = '', $url = '', Request $request) {
        $post = Post::where('type', $type)->where('url', $url)->first();

        // 対象の記事が存在するか確認
        if (!isset($post)) {
            return [
                'result' => false,
                'reason' => 'post is not exist'
            ];
        }

        // パラメータを取得
        $input = $request->all();
        // ユーザ名のバリデーションチェック
        if (!isset($input['name']) || !is_string($input['name']) || (mb_strlen($input['name']) > 15)) {
            return [
                'result' => false,
                'reason' => 'name is too long'
            ];
        } else if (empty(str_replace([' ', '　'], '', $request->input('name')))) {
            return [
                'result' => false,
                'reason' => 'name is empty'
            ];
        }

        // 本文のバリデーションチェック
        if (!isset($input['body']) || !is_string($input['body']) || (mb_strlen($input['body']) > 3000)) {
            return [
                'result' => false,
                'reason' => 'body is too long'
            ];
        } else if (empty(str_replace([' ', '　'], '', $request->input('name')))) {
            return [
                'result' => false,
                'reason' => 'name is empty'
            ];
        }
        // 本文のヤベー奴を変える
        $body = htmlspecialchars($input['body']);

        // 管理人かどうかをチェック
        $isAdmin = false;
        if (isset($input['password']) && ($_SERVER['REMOTE_ADDR'] === $_ENV['TOERA_IP'])) {
            if (md5($input['password']) === $_ENV['COMMENT_PASSWORD_MD5']) {
                $isAdmin = true;
            }
        }

        // アイコン画像のチェック
        if (!isset($input['image'])) {
            return [
                'result' => false,
                'reason' => 'image is empty'
            ];
        } else {
            // ドメイン指定があれば抜いておく
            $input['image'] = parse_url($input['image'])['path'];

            // 管理人じゃない時にアイコン用以外の画像が指定されてたらエラーにする
            if (!$isAdmin && !preg_match('#/images/comment/icon/.+(\.jpg|\.png|\.gif)$#', $input['image'])) {
                return [
                    'result' => false,
                    'reason' => 'image is not image file'
                ];
            }

            // 画像が存在するか確認
            $client = new Client();
            $res = $client->request('GET', 'https://sssignal.com' . $input['image'], ['verify' => false]);

            // 画像が存在しなかった
            if ($res->getStatusCode() != '200') {
                return [
                    'result' => false,
                    'reason' => 'image is not exist'
                ];
            }
        }

        // コメントをDBに追加
        $comments = isset($post->comments) ? $post->comments : [];

        $newComment = [
            'id' => count($comments),
            'name' => $input['name'],
            'body' => nl2br(str_replace(['<', '>'], ['&lt;', '&gt;'], $body)),
            'image' => $input['image'],
            'date' => date('Y-m-d H:i:s'),
            // 管理人判別用のパラメータ・コメントした人のIPなどの情報入れる
            'remote_addr' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT']
        ];

        $comments[] = $newComment;

        $post->comments = $comments;

        try {
            $post->save();
        } catch (Exception $e) {
            return [
                'result' => false,
                'reason' => 'error at data update to MongoDB'
            ];
        }

        // メールを送信するキューを発行
        sendCommentMail::dispatch([
            'url' => $type . '/' . $url,
            'icon' => $newComment['image'],
            'name' => $newComment['name'],
            'body' => $newComment['body'],
            'remote_addr' => $newComment['remote_addr'],
            'user_agent' => $newComment['user_agent']
        ])->onQueue('sendCommentMail');

        return [
            'result' => true
        ];
    }
}
