<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="{{ action('Admin\PostController@index') }}" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="s" class="form-control" placeholder="搜索文章...">
                <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">菜单</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="{{ action('Admin\\IndexController@index') }}">
                    <i class="fa fa-home"></i>
                    <span>首页</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>文章</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('Admin\\PostController@create') }}">撰写新文章</a></li>
                    <li><a href="{{ action('Admin\\PostController@index') }}">所有文章</a></li>
                    @foreach($tags as $tag)
                        <li><a href="{{ action('Admin\\PostController@tag', ['id' => $tag->id]) }}">{{ $tag->slug }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ action('Admin\OptionController@edit') }}">
                    <i class="fa fa-gear"></i>
                    <span>设置</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
