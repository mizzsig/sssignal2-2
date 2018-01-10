@extends('common.layout')

@section('title', '水飴信号ばーじょん２')

@section('header')
@include('common.header')
@endsection

@section('main')
<div>記事一覧</div>
<input class="search-bar" placeholder="記事を検索"></input>
<button class="search-button" onClick="console.log(1);">けんさく！</button>
<div>記事は全部で{{ count($posts) }}件！</div>
<div>
	@foreach ($posts as $post)
	<div class="post">
		<a href={{ $post['type'] . '/' . $post['url'] }}>
			<div class="post-date">{{ $post['date'] }}</div>
			<div class="post-title">{{ $post['title'] }}</div>
			<div class="post-abstract">{{ $post['abstract'] }}</div>
		</a>
		<div class="post-tags">
			@foreach ($post['tag'] as $tag)
				<div class="post-tag">{{ $tag }}</div>
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@endsection

@section('sub')
@include('common.sub')
@endsection

