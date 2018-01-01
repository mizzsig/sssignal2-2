<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AboutController extends Controller
{
		// route 'about'
    static function index()
		{
				$posts = Post::all();
				echo "<pre>";
				var_dump($posts);
				exit;
		}
}
