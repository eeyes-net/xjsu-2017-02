@extends('admin.layouts.master')

@section('title', '设置')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>设置</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ action('Admin\\IndexController@index') }}"><i class="fa fa-dashboard"></i> 后台管理</a>
            </li>
            <li>
                设置
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <!-- Main row -->
        <div class="row">
            <form action="{{ action('Admin\OptionController@update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <section class="col-lg-10 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">设置</h3>
                        </div>
                        <div class="box-body">
                            @if (auth()->user()->group === 'root')
                                <div class="form-group">
                                    <label>主页附加信息（非技术人员请勿修改！！）</label>
                                    <textarea class="form-control" name="body_prepend">{{ $body_prepend }}</textarea>
                                    <span class="help-block">body元素最开始的html内容</span>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>首页轮播图</label>
                                <textarea class="form-control" style="height: 10em;" name="carousels" placeholder="文章id||图片链接&#10;文章id||图片链接&#10;...">{{ $carousels }}</textarea>
                                <span class="help-block">文章id||图片链接</span>
                            </div>
                            <div class="form-group">
                                <label>学生会成员数</label>
                                <input type="text" class="form-control" name="member_count" placeholder="191954" value="{{ $member_count }}">
                            </div>
                            <div class="form-group">
                                <label>学生会简介</label>
                                <textarea class="form-control" style="height: 10em;" name="xjsu_introduction" placeholder="西安交通大学学生会...">{{ $xjsu_introduction }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>学生会简介更多</label>
                                <input type="text" class="form-control" name="xjsu_introduction_more" placeholder="文章id" value="{{ $xjsu_introduction_more }}">
                                <span class="help-block">文章id</span>
                            </div>
                            <div class="form-group">
                                <label>主席团风采</label>
                                <textarea class="form-control" style="height: 10em;" name="presidium" placeholder="姓名||文章id||简介&#10;姓名||文章id||简介&#10;...">{{ $presidium }}</textarea>
                                <span class="help-block">姓名||文章id||简介</span>
                            </div>
                            <div class="form-group">
                                <label>部门介绍</label>
                                <textarea class="form-control" style="height: 10em;" name="ministers" placeholder="部门名称||文章id&#10;部门名称||文章id&#10;...">{{ $ministers }}</textarea>
                                <span class="help-block">部门名称||文章id</span>
                            </div>
                            <div class="form-group">
                                <label>校园网址速达</label>
                                <textarea class="form-control" style="height: 10em;" name="links" placeholder="名称||网址&#10;名称||网址&#10;...">{{ $links }}</textarea>
                                <span class="help-block">名称||网址</span>
                            </div>
                            <div class="form-group">
                                <label>联系我们链接</label>
                                <input type="text" class="form-control" name="contact_us" placeholder="文章id" value="{{ $contact_us }}">
                                <span class="help-block">文章id</span>
                            </div>
                            <div class="form-group">
                                <label>网站简介链接</label>
                                <input type="text" class="form-control" name="about_website" placeholder="文章id" value="{{ $about_website }}">
                                <span class="help-block">文章id</span>
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
