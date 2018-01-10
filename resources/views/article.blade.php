@extends('common.layout')

@section('title', $post['title'])

@section('header')
@include('common.header')
@endsection

@section('main')
<div class="section">
	<div class="section-title">{{ $post['title'] }}</div>
	<div class="section-content">
		<p>{{ $post['body'] }}</p>
	</div>
</div>
@endsection

@section('sub')
@include('common.sub')
@endsection