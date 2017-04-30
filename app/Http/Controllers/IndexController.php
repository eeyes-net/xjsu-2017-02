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
        $carousels = Option::getOption('carousels', []);
        $xjsu_introduction = Option::getOption('xjsu_introduction');
        $xjsu_introduction_more = Option::getOption('xjsu_introduction_more');
        $news = Tag::findName('news')->posts()->latest()->limit(6)->get();
        $pushes = Tag::findName('push')->posts()->latest()->limit(3)->get();
        $ministers = Option::getOption('ministers');
        $activities = Tag::findName('activity')->posts()->latest()->limit(3)->get();
        $applies = Tag::findName('apply')->posts()->latest()->limit(6)->get();
        $perspectives = Tag::findName('perspective')->posts()->latest()->limit(6)->get();
        $freshmen = Tag::findName('freshman')->posts()->latest()->limit(6)->get();
        $links = Option::getOption('links');
        $presidium = Option::getOption('presidium');
        return view('index.index.index', compact(
            'carousels',
            'xjsu_introduction',
            'xjsu_introduction_more',
            'news',
            'pushes',
            'ministers',
            'activities',
            'links',
            'presidium',
            'applies',
            'perspectives',
            'freshmen'));
    }
}
