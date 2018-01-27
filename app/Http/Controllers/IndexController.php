<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class IndexController extends Controller
{
    // route '/'
    static function index() {
				$posts = Post::orderBy('_id', 'desc')->get();

        return view('index', [
						'posts' => $posts
				])->with('title', '');
    }
}
