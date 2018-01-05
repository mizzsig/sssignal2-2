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
				]);
    }
}
