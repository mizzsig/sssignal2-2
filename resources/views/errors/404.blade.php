@extends('common.layout')

@section('title', 'ページが見つかりません - 水飴信号 - Starch Syrup Signal -')

@section('meta')
@include('common.meta')
@endsection

@section('header')
@include('common.header')
<style>
html, body, main {
	background-image: url('/images/404_bg.png');
}
</style>
@endsection

@section('main-img')
<img src="/images/header.png">
@endsection

@section('main')
<img src="/images/404.png">
@endsection

@section('sub')
@include('common.sub')
@endsection
