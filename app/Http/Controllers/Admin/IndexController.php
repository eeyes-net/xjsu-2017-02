<?php

namespace App\Http\Controllers\Admin;

class IndexController extends Controller
{
    /**
     * 后台管理主页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
}
