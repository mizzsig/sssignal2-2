<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\ContactSent;
use Illuminate\Support\Facades\Mail;

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
		$contact = $request->all();

		if (!isset($contact['body'])) {
			return view('about');
		}

		Mail::to($_ENV['MAIL_USERNAME'])
			->send(new ContactSent($contact));

		return view('about');
	}
}
