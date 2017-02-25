@extends('admin.layouts.master')

@section('title', '编辑文章')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>编辑文章</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li>
                <a href="{{ action('Admin\\PostController@index') }}">文章</a>
            </li>
            <li class="active">
                编辑文章
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <form action="{{ action('Admin\\PostController@update', ['id' => $post->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <section class="col-lg-9 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">文章主体</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>标题</label>
                                <input type="text" class="form-control" name="title" placeholder="标题" value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label>内容</label>
                                <script type="text/javascript" src="{{ asset('ueditor/ueditor.config.js') }}"></script>
                                <script type="text/javascript" src="{{ asset('ueditor/ueditor.all.min.js') }}"></script>
                                <script type="text/javascript" src="{{ asset('ueditor/lang/zh-cn/zh-cn.js') }}"></script>
                                <script type="text/plain" name="body" id="editor" style="width: 100%; height: 500px;">{!! $post->body !!}</script>
                                <script>
                                    var ue = UE.getEditor('editor');
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="box box-info">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="fa fa-info"></i>
                            <h3 class="box-title">文章信息</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>地点</label>
                                <input type="text" class="form-control" name="meta[place]" placeholder="地点" value="{{ $post->getMeta('place', '未定') }}">
                            </div>
                            <div class="form-group">
                                <label>时间</label>
                                <input type="text" class="form-control" name="meta[time]" placeholder="时间" value="{{ $post->getMeta('time', '未定') }}">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-lg-3 connectedSortable">
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
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">文章分类</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>类别</label>
                                <?php $post_tags = $post->tags->pluck('name')->all(); ?>
                                @include('admin.posts.layouts.post_type_selector')
                            </div>
                        </div>
                    </div>
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">标题图片</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="picture">图片URL</label>
                                <input type="text" class="form-control" id="picture" name="meta[picture]" value="{{ $post->getMeta('picture', '') }}">
                            </div>
                            <div class="form-group">
                                <img id="picture_preview" src="{{ $post->getMeta('picture', '') }}" alt="标题图片预览" style="width: 100%;">
                            </div>
                            <div class="form-group">
                                <a class="btn btn-default" href="javascript:showUpload();void 0;">选择图片</a>
                            </div>
                        </div>
                    </div>
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">访问量</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>访问量</label>
                                <input class="form-control" type="text" name="meta[visit_count]" value="{{ $post->getMeta('visit_count', '0') }}">
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            @include('admin.posts.layouts.uploadimage')
        </div>
        <!-- /.row (main row) -->

        <!-- Danger zone row -->
        <div class="row">
            <section class="col-lg-10">
                <div class="box box-danger">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-close"></i>
                        <h3 class="box-title">删除</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <form action="{{ action('Admin\\PostController@destroy', ['id' => $post->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row (danger zone row) -->

    </section>
    <!-- /.content -->
@stop
