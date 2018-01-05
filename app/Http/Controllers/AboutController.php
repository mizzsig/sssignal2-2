<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AboutController extends Controller
{
		// route 'about'
    static function index()
		{
				return view('about');
		}
}
