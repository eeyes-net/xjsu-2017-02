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
        $news = Tag::findName('news')->posts()->latest()->limit(6)->get();
        $pushes = Tag::findName('push')->posts()->latest()->limit(3)->get();
        $ministers = Tag::findName('minister')->posts()->latest()->get();
        $activities = Tag::findName('activity')->posts()->latest()->limit(3)->get();
        $applies = Tag::findName('apply')->posts()->latest()->limit(6)->get();
        $perspectives = Tag::findName('perspective')->posts()->latest()->limit(6)->get();
        $freshmen = Tag::findName('freshman')->posts()->latest()->limit(6)->get();
        $links = Option::getOption('links');
        $presidium = Option::getOption('presidium');
        return view('index.index.index', compact('xjsu_introduction', 'news', 'pushes', 'ministers', 'activities', 'links', 'presidium', 'applies', 'perspectives', 'freshmen'));
    }
}
