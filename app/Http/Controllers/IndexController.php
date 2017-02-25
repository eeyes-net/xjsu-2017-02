<?php

namespace App\Http\Controllers;

use App\Option;
use App\Tag;

class IndexController extends Controller
{
    /**
     * Display the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xjsu_introduction = Option::getOption('xjsu_introduction');
        $news = Tag::where('name', 'news')->first()->posts;
        return view('index.index.index', compact('xjsu_introduction', 'news'));
    }
    public function news()
    {
        return Tag::where('name', 'news')->first()->posts->field();
    }
}
