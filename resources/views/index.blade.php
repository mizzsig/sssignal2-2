@extends('common.layout')

@section('title', $title . '水飴信号 - Starch Syrup Signal -')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mizzsig">
<meta name="twitter:title" content="水飴信号 - Starch Syrup Signal -">
<meta name="twitter:description" content="プログラムを作ったりするサイトです">
<meta name="twitter:image" content="https://sssignal.com/images/header.png">

@section('header')
@include('common.header')
@endsection

@section('main')
<!-- 今後のバージョンで実装 (๑╹ω╹๑ )
<input class="search-bar" placeholder="記事を検索"></input>
<button class="search-button" onClick="console.log(1);">けんさく！</button>
-->
<div class="search-count">記事一覧 全{{ count($posts) }}件</div>
<div>
	@foreach ($posts as $post)
	<div class="post">
		<!-- 左側に置く画像 -->
		<div class="post-image">
			<a href={{ '/' . $post['type'] . '/' . $post['url'] }}>
				<img class="post-image" src={{ $post['image'] }}>
			</a>
		</div>
		<!-- 右側の文章系 -->
		<div class="post-detail">
			<!-- タグ以外のリンクにするやつら -->
			<div class="post-link">
				<a href={{ '/' . $post['type'] . '/' . $post['url'] }}>
					<div class="post-title">{{ $post['title'] }}</div>
					<div class="post-abstract">{{ $post['description'] }}</div>
				</a>
			</div>
			<!-- タグは別のリンクにするのでdivも別で -->
			<div class="post-tags">
				<div class="post-date">{{ $post['date'] }}</div>
<!-- 今後のバージョンで実装 ٩( ᐛ )و
				<div class="post-tag">tags : </div>
				@foreach ($post['tag'] as $tag)
					<div class="post-tag"><a href="#">{{ $tag }}</a></div>
				@endforeach
				-->
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection

@section('sub')
@include('common.sub')
@endsection

