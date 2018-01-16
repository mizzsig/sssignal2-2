@extends('common.layout')

<link rel="stylesheet" href="/css/mailform.css">
@section('title', 'About | 水飴信号ばーじょん２')

@section('header')
@include('common.header')
@endsection

@section('main')
<div class="section">
	<div class="section-title">このサイトについて</div>
	<div class="section-content">
		<p>このサイトは、<b>とえら</b>が作ったゲームやら記事やらが置かれるはずのサイトです。</p>
		<p>超すごいサイトになればいいな・・・！</p>
		<p>このサイトはどのページもリンクフリーです。<br>
		画像の無断転載と直リンクはご遠慮ください。<br>
		ご意見・ご連絡などは下のメールフォームか、Twitterにどうぞ！</p>
	</div>
</div>
<div class="section">
	<div class="section-title">ネット活動リンク集</div>
	<div class="section-content">
		<ul>
			<li><a href="https://twitter.com/mizzsig">Twitter</a></li>
			<li><a href="https://www.pixiv.net/member.php?id=6026774">Pixiv</a></li>
			<li><a href="https://www.youtube.com/channel/UCb2WxFdr5dofyDnAANnsY1A">Youtube</a></li>
			<li><a href="https://github.com/mizzsig">Github</a></li>
			<li><a href="https://www.hackerrank.com/toera">HackerRank</a></li>
			<li><a href="https://yukicoder.me/users/1817">yukicoder</a></li>
			<li><a href="https://c9.io/toera">Cloud9</a></li>
			<li><a href="https://codepen.io/toera">CodePen</a></li>
			<li><a href="http://sssignal.web.fc2.com/">旧・水飴信号</a></li>
		</ul>
	</div>
</div>
<div class="section">
	<div class="section-title">メールフォーム</div>
	<div class="section-content">
		<form class="mailform" method="post">
			<input placeholder="名前(任意)">
			<input placeholder="メールアドレス(任意)">
			<textarea placeholder="本文(必須)"></textarea>
			<button type="submit">そうしん！</button>
		</form>
	</div>
</div>
@endsection

@section('sub')
@include('common.sub')
@endsection