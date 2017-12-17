@extends('common.layout')

@section('title', '水飴信号ばーじょん２')

@section('header')
@include('common.header')
@endsection

@section('main')
<div>記事一覧</div>
<input class="search-bar"></input>
<button class="search-button" onClick="console.log(1);">けんさく！</button>
@endsection

@section('sub')
@include('common.sub')
@endsection

