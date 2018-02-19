@extends('common.layout')

@section('title', 'チェキちゃんとテキちゃんのコードレビュー室 | 水飴信号 - Starch Syrup Signal -')

@section('meta')
@include('common.meta')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mizzsig">
<meta name="twitter:title" content="水飴信号 - Starch Syrup Signal -">
<meta name="description" content="プログラムを作ったりするサイトです">
<meta name="twitter:description" content="プログラムを作ったりするサイトです">
<meta name="twitter:image" content="https://sssignal.com/images/header.png">
@endsection

@section('header')
@include('common.header')
@endsection

@section('main')
  <input type="file" webkitdirectory directory /><br>
	<button>ファイルおw選択</button><br>
	<div class="files"></div>
@endsection

@section('sub')
@include('common.sub')
@endsection

@section('script')
@include('common.script')
<script>
$(function() {
	$('.select-files').on('click', function() {
		$('.files').append('<div>ファイルw</div>');
	});
});
</script>
@endsection

