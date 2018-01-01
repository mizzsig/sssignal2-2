<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    // route '/game'
    static function index() {
        return view('index');
    }
}
