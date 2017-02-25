@extends('admin.layouts.master')

@section('title', '学生会简介')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>学生会简介</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li>
                <a href="{{ action('Admin\\OptionController@index') }}">设置</a>
            </li>
            <li class="active">
                学生会简介
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <form action="{{ action('Admin\OptionController@update', ['name' => 'xjsu_introduction']) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <section class="col-lg-10 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">学生会简介</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <textarea class="form-control" name="value" placeholder="西安交通大学学生会...">{{ $value }}</textarea>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-lg-2 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="fa fa-save"></i>
                            <h3 class="box-title">保存</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">保存</button>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@stop
