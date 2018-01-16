<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\ContactSent;

class AboutController extends Controller
{
		// route 'about'
    static function index()
		{
				return view('about');
		}

		// お問い合わせメール送信
		static function contactSent(Request $request)
		{
				Mail::to('送信先アドレス(configとかに書きたい)')
						->send(new ContactSent());	
		}
}
