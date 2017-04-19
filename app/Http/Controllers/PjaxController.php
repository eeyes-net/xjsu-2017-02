<?php

namespace App\Http\Controllers;

use App\Tag;

class PjaxController extends Controller
{
    public function news()
    {
        $news = Tag::findName('news')->posts()->latest()->paginate(6);
        return view('index.index.layouts.layouts.news', compact('news'));
    }

    public function push()
    {
        $pushes = Tag::findName('push')->posts()->latest()->paginate(3);
        return view('index.index.layouts.layouts.push', compact('pushes'));
    }

    public function activity()
    {
        $activities = Tag::findName('activity')->posts()->latest()->paginate(3);
        return view('index.index.layouts.layouts.activity', compact('activities'));
    }
}
