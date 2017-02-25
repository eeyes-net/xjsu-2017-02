@extends('index.layouts.master')

@section('head-append')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/propeling.css') }}">
@stop

@section('header')
    @include('index.layouts.header')
    <div class="position">
        <a href="">首页</a>
        <img src="{{ asset('img/arrow.png') }}">
        <a href="" class="green">品牌活动</a>
        <img src="{{ asset('img/arrow.png') }}">
        <a href="" class="gray">交大之星</a>
    </div>
@stop

@section('main')
    @include('index.posts.layouts.post')
@stop

@section('footer')
    @include('index.layouts.footer')
@stop
