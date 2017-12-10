<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // route '/'
    static function index() {
        return view('index');
    }
}
