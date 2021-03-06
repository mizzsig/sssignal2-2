<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ColumnController extends Controller
{
    // route '/column'
    static function index() {
        $posts = Post::where('type', 'column')->orderBy('_id', 'desc')->get();

        return view('index', [
            'posts' => $posts
        ])->with('title', 'Column - ');
    }

    // route '/column/{id}'
    static function article($url = '') {
        $post = Post::where('url', $url)->get();

        if (!isset($post[0])) {
            abort('404');
        }

        return view('article', [
            'post' => $post[0]
        ]);
    }
}
