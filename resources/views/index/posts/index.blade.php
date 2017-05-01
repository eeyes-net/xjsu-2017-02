@extends('index.layouts.master')
@section('head-append')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/propeling.css') }}">
@stop

@section('header')
    @include('index.layouts.header')
@stop

@section('main')
    <?php $news = $posts ?>
    @include('index.index.layouts.news')
{{--    {{ $posts->links() }}--}}
@stop

@section('footer')
    @include('index.layouts.footer')
@stop
