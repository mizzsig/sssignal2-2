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
}
