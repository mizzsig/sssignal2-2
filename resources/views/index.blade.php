@extends('common.layout')

@section('title', '水飴信号ばーじょん２')

@section('header')
@include('common.header')
@endsection

@section('main')
<div>記事一覧</div>
<input class="search-bar" placeholder="記事を検索"></input>
<button class="search-button" onClick="console.log(1);">けんさく！</button>
<!-- dummy -->
<div>
	<div class="post">aaa</div>
	<div class="post">bbb</div>
	<div class="post">ccc</div>
</div>
@endsection

@section('sub')
@include('common.sub')
@endsection

