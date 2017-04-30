<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * 显示文章列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
        return view('index.posts.index', compact('posts'));
    }

    /**
     * 显示文章列表
     *
     * @return \Illuminate\Http\Response
     */
    public function tag($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->paginate();
        return view('index.posts.index', compact('posts'));
    }

    /**
     * 显示文章
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->make('Post not found', 404);
        }
        return view('index.posts.post', compact('post'));
    }
}
