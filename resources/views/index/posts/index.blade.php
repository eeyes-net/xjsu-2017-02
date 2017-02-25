@extends('index.layouts.master')
@section('head-append')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/propeling.css') }}">
@stop

@section('header')
    @include('index.layouts.header')
@stop

@section('main')
    @foreach($posts as $post)
        <article>
            <h1><a href="{{ action('PostController@show', ['id' => $post->id]) }}">{{ $post->title }}</a></h1>
        </article>
    @endforeach
    {{ $posts->links() }}
@stop

@section('footer')
    @include('index.layouts.footer')
@stop
