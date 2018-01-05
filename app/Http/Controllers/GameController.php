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
}
