@extends('admin.layouts.master')

@section('title', '网址速达')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>网址速达</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li>
                <a href="{{ action('Admin\\PostController@index') }}">设置</a>
            </li>
            <li class="active">
                网址速达
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <form action="{{ action('Admin\OptionController@update', ['name' => 'links']) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <section class="col-lg-10 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">网址速达</h3>
                        </div>
                        <div class="box-body">
                            @if($value)
                                @foreach($value as $i => $item)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <input class="form-control" name="value[{{ $i }}][name]" value="{{ $item['name'] }}">
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" name="value[{{ $i }}][url]" value="{{ $item['url'] }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <?php ++$i; ?>
                            @else
                                <?php $i = 0; ?>
                            @endif
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input class="form-control" name="value[{{ $i }}][name]">
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="value[{{ $i }}][url]">
                                    </div>
                                </div>
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
