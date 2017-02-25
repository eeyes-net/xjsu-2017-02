@extends('admin.layouts.master')

@section('title', '文章列表')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>文章列表</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li>
                <a href="{{ action('Admin\\PostController@index') }}">文章</a>
            </li>
            <li class="active">
                文章列表
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-10 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">所有文章</h3>
                    </div>
                    <div class="box-body">
                        @foreach($posts as $post)
                            <div class="item">
                                <p class="message">
                                    <a href="{{ action('Admin\PostController@edit', ['id' => $post->id]) }}" class="name">
                                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $post->created_at }}</small>
                                        <h4>{{ $post->title }}</h4>
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div class="box-footer">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            <section class="col-lg-2 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus"></i>
                        <h3 class="box-title">新文章</h3>
                    </div>
                    <div class="box-body">
                        <a class="btn btn-default" href="{{ action('Admin\PostController@create') }}">撰写新文章</a>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@stop
