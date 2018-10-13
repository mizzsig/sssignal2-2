@extends('common.layout')

@section('title', $post['title'] . ' - 水飴信号 - Starch Syrup Signal -')

@section('meta')
@include('common.meta')
@inject('body', 'App\Providers\PostBodyServiceProvider')
{!! $body->writeStyle($post['styles']) !!}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mizzsig">
<meta name="twitter:title" content="{{ $post['title'] . ' - 水飴信号 - Starch Syrup Signal -' }}">
<meta name="description" content="{{ $post['description'] }}">
<meta name="twitter:description" content="{{ $post['description'] }}">
<meta name="twitter:image" content="{{'https://sssignal.com' . $post['twitter-image'] }}">
@endsection

@section('header')
@include('common.header')
@endsection

@section('main-img')
<img src="{{ $post['main-image'] }}">
@endsection

@section('main')
<div class="main-content">
{!! $body->writeBody($post['body']) !!}
</div>
{{-- コメント --}}
<div class="container-comment">
    コメントする
</div>
@endsection

@section('sub')
@include('common.sub')
@endsection

@section('script')
@include('common.script')
{!! $body->writeScript($post['scripts']) !!}
@endsection
