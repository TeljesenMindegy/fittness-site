<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('posts.show')
            ->with(compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = Auth::user()
            ->posts()
            ->create($request->post);

        return redirect()
            ->route('post.show', ['post' => $post])
            ->with('success', __('Post created successfully'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(compact('post'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->post);

        return redirect()
            ->route('post.show', ['post' => $post])
            ->with('success', __('Post updated successfully'));
    }

    public function destory(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('profile.show', ['user' => Auth::user()])
            ->with('success', __('Post deleted successfully'));
    }
}