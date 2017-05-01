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
            <section class="col-lg-10 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">所有用户</h3>
                    </div>
                    <div class="box-body">
                        @foreach($users as $user)
                            <div class="row">
                                <div class="col-xs-3">
                                    <h4>{{ $user->username }} - {{ $user->group }}</h4>
                                </div>
                                <div class="col-xs-9">
                                    <form action="{{ action('Admin\UserController@delete', ['id'=>$user->id]) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger pull-right" value="删除用户">
                                    </form>
                                    @if (auth()->user()->group === 'root')
                                        <form action="{{ action('Admin\UserController@update', ['id' => $user->id]) }}" method="POST">
                                            {{ method_field('PATCH') }}
                                            {{ csrf_field() }}
                                            <input type="hidden" name="group" value="root">
                                            <input type="submit" class="btn btn-danger pull-right" value="设为root" @if ($user->group == 'root') disabled @endif>
                                        </form>
                                    @endif
                                    <form action="{{ action('Admin\UserController@update', ['id' => $user->id]) }}" method="POST">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="group" value="admin">
                                        <input type="submit" class="btn btn-success pull-right" value="设为管理员" @if ($user->group == 'admin') disabled @endif>
                                    </form>
                                    <form action="{{ action('Admin\UserController@update', ['id' => $user->id]) }}" method="POST">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="group" value="user">
                                        <input type="submit" class="btn btn-primary pull-right" value="设为普通用户" @if ($user->group == 'user') disabled @endif>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="col-lg-2 connectedSortable">
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
