@extends('common.plane')

@section('title', $post['title'] . ' - 水飴信号 - Starch Syrup Signal -')

@section('meta')
@inject('body', 'App\Providers\PostBodyServiceProvider')
{!! $body->writeStyle($post['styles']) !!}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@mizzsig">
<meta name="twitter:title" content="{{ $post['title'] . ' - 水飴信号 - Starch Syrup Signal -' }}">
<meta name="description" content="{{ $post['description'] }}">
<meta name="twitter:description" content="{{ $post['description'] }}">
<meta name="twitter:image" content="{{'https://sssignal.com' . $post['image'] }}">
@endsection

@section('main')
{!! $body->writeBody($post['body']) !!}
@endsection

@section('script')
{!! $body->writeScript($post['scripts']) !!}
@endsection
