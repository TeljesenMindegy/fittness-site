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
        dd(Auth::user());
        $post = Auth::user()
            ->posts()
            ->create($request->post);

        return redirect()
            ->route('post.show', ['post' => $post])
            ->with('success', __('Post created successfully'));
    }
}