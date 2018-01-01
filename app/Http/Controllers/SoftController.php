<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoftController extends Controller
{
    // route '/soft'
    static function index() {
        return view('index');
    }
}
