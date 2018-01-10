<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SoftController extends Controller
{
    // route '/soft'
    static function index() {
				$posts = Post::where('type', 'soft')->orderBy('_id', 'desc')->get();

        return view('index', [
						'posts' => $posts
				]);
    }

		// route '/soft/{url}'
		static function soft($url) {
			  $post = Post::where('url', $url)->where('type', 'soft')->get();

				return view('article', [
		       'post' => $post[0]
	      ]); 
		}
}
