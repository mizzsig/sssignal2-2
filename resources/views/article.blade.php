@extends('common.layout')

@section('title', $post['title'] . ' - 水飴信号 - Starch Syrup Signal -')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mizzsig">
<meta name="twitter:title" content="{{ $post['title'] . ' - 水飴信号 - Starch Syrup Signal -' }}">
<meta name="description" content="{{ $post['description'] }}">
<meta name="twitter:description" content="{{ $post['description'] }}">
<meta name="twitter:image" content="{{'https://sssignal.com' . $post['image'] }}">

@section('header')
@include('common.header')
@endsection

@section('main')

@inject('body', 'App\Providers\PostBodyServiceProvider')
{!! $body->writeBody($post['body']) !!}

@endsection

@section('sub')
@include('common.sub')
@endsection