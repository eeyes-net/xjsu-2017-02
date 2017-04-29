<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * 显示分类文章列表
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function tag($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * 写新文章
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * 保存新文章
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $post = auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        $metas = request('meta');
        $tags = request('tags', []);
        $sync_tags = [];
        foreach ($tags as $tag_id => $value) {
            if ($value) {
                $sync_tags[] = $tag_id;
            }
        }
        $post->tags()->sync($sync_tags);
        foreach ($metas as $key => $meta) {
            $post->setMeta($key, $meta);
        }
        return redirect(action('Admin\\PostController@edit', ['id' => $post->id]));
    }

    /**
     * 显示指定文章（直接跳转到文章）
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(action('PostsController@show', ['id' => $id]));
    }

    /**
     * 编辑指定文章
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * 保存编辑后的文章
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = Post::find($id);
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        $tags = request('tags');
        $sync_tags = [];
        foreach ($tags as $tag_id => $value) {
            if ($value) {
                $sync_tags[] = $tag_id;
            }
        }
        $post->tags()->sync($sync_tags);
        $metas = request('meta');
        foreach ($metas as $key => $meta) {
            $post->setMeta($key, $meta);
        }
        return redirect()->back();
    }

    /**
     * 删除指定文章.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(action('Admin\\PostController@index'));
    }
}
