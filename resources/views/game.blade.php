@extends('common.plane')

@section('title', $post['title'])

@section('meta')
@inject('body', 'App\Providers\PostBodyServiceProvider')
{!! $body->writeStyle($post['styles']) !!}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mizzsig">
<meta name="twitter:title" content="{{ $post['title'] }}">
<meta name="description" content="{{ $post['description'] }}">
<meta name="twitter:description" content="{{ $post['description'] }}">
<meta name="twitter:image" content="{{'https://sssignal.com' . $post['twitter-image'] }}">
@endsection

@section('main')
<div class="main-content">
{!! $body->writeBody($post['body']) !!}
</div>
@endsection

@section('script')
{!! $body->writeScript($post['scripts']) !!}
@endsection
