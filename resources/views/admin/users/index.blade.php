@extends('admin.layouts.master')

@section('title', '所有用户')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>所有用户</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li class="active">
                所有用户
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">所有用户</h3>
                    </div>
                    <div class="box-body">
                        @foreach($users as $user)
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4>{{ $user->username }}</h4>
                                </div>
                                <div class="col-xs-6">
                                    <form action="{{ action('Admin\UserController@delete', ['id'=>$user->id]) }}" method="POST">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger pull-right" value="删除用户">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="col-lg-5 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-plus"></i>
                        <h3 class="box-title">添加新用户</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ action('Admin\UserController@store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="username">NetId</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <input type="submit" class="btn btn-default" value="添加新用户">
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@stop
