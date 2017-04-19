@extends('admin.layouts.master')

@section('title', '禁止注册')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>禁止注册</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li>
                <a href="{{ action('Admin\\PostController@index') }}">设置</a>
            </li>
            <li class="active">
                禁止注册
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-6 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">禁止注册</h3>
                    </div>
                    <div class="box-body">
                        @if ($value)
                            <div class="alert alert-danger">当前状态：禁止注册</div>
                        @else
                            <div class="alert alert-success">当前状态：允许注册</div>
                        @endif
                        <p>请在管理员注册完毕之后立刻禁止注册</p>
                        <form action="{{ action('Admin\OptionController@update', ['name' => 'no_register']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="value" value="1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">禁止注册</button>
                            </div>
                        </form>
                        <form action="{{ action('Admin\OptionController@update', ['name' => 'no_register']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="value" value="0">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">允许注册</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@stop
