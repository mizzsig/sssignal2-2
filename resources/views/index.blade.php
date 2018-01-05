@extends('common.layout')

@section('title', '水飴信号ばーじょん２')

@section('header')
@include('common.header')
@endsection

@section('main')
<div>記事一覧</div>
<input class="search-bar" placeholder="記事を検索"></input>
<button class="search-button" onClick="console.log(1);">けんさく！</button>
<div>
	@foreach ($posts as $post)
	<div class="post">
		<div class="post-title">{{ $post['title'] }}</div>
	</div>
	@endforeach
</div>
@endsection

@section('sub')
@include('common.sub')
@endsection

