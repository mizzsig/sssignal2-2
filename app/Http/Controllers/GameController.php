<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GameController extends Controller
{
    // route '/game'
    static function index() {
				$posts = Post::where('type', 'game')->orderBy('_id', 'desc')->get();

        return view('index', [
						'posts' => $posts
				]);
    }

		// route '/game/{url}'
		static function game($url) {
				$post = Post::where('url', $url)->where('type', 'game')->get();

				return view('article', [
						'post' => $post[0]
				]);
		}
}
