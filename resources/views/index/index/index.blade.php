@extends('index.layouts.master')
@section('header')
    @include('index.layouts.header')
    @include('index.index.layouts.carousel')
@stop
@section('main')
    @include('index.index.layouts.news')
    @include('index.index.layouts.push')
    @include('index.index.layouts.about')
    @include('index.index.layouts.activity')
    @include('index.index.layouts.service')
{{--    @include('index.index.layouts.contact')--}}
@stop
@section('footer')
    @include('index.layouts.footer')
@stop
