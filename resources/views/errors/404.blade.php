@extends('common.layout')

@section('title', 'ページが見つかりません - 水飴信号 - Starch Syrup Signal -')

@section('header')
@include('common.header')
@endsection

<style>
html, body, main {
	background-image: url('/images/404_bg.png');
}
</style>

@section('main')
<img src="/images/404.png">
@endsection

@section('sub')
@include('common.sub')
@endsection
