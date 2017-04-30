@extends('index.layouts.master')

@section('head-append')
    <link rel="stylesheet" type="text/css" href="/assets/index/css/post.css">
@stop

@section('header')
    @include('index.layouts.header')
    <div class="post-nav-container">
        <div class="post-nav">
            <div class="post-nav-path-container">
                <a href="{{ action('IndexController@index') }}">
                    <div class="post-nav-path home"><span class="post-nav-path-text">首页</span></div>
                </a>
                <?php $tag = $post->tags()->first(); ?>
                <a href="{{ action('PostController@tag', ['id' => $tag->id]) }}">
                    <div class="post-nav-path category"><span class="post-nav-path-text">{{ $tag->slug }}</span></div>
                </a>
                <a href="{{ action('PostController@show', ['id' => $post->id]) }}">
                    <div class="post-nav-path title"><span class="post-nav-path-text">{{ $post->title }}</span></div>
                </a>
            </div>
        </div>
    </div>
@stop

@section('main')
    @include('index.posts.layouts.post')
@stop

@section('footer')
    @include('index.layouts.footer')
@stop
