@extends('admin.layouts.master')

@section('title', '主页')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>首页</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li class="active">
                首页
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">链接</h3>
                    </div>
                    <div class="box-body">
                        <a class="btn btn-default" href="{{ action('Admin\PostController@index') }}">所有文章</a>
                        {{--<a class="btn btn-default" href="{{ action('Admin\OptionController@index') }}">设置</a>--}}
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@stop
