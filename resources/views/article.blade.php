@extends('common.layout')

@section('title', $post['title'])

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