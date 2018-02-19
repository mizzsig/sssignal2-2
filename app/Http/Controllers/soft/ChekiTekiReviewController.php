<?php

namespace App\Http\Controllers\soft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChekiTekiReviewController extends Controller
{
    // route '/soft/ChekiTekiReview'
    static function index() {
				return view('soft/ChekiTeki');
    }
}
