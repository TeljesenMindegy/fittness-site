<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use File;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

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

        $this->uploadImage($post);

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
        if ($post->picture != $request->picture) {
            if($post->picture) {
                $this->deleteImage($post);
            }
        }
        $post->update($request->post);
        $this->uploadImage($post);

        return redirect()
            ->route('post.show', ['post' => $post])
            ->with('success', __('Post updated successfully'));
    }

    public function destory(Post $post)
    {
        $this->deleteImage($post);
        $post->delete();

        return redirect()
            ->route('profile.show', ['user' => Auth::user()])
            ->with('success', __('Post deleted successfully'));
    }

    public function comment(Post $post, Request $request)
    {
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'body' => $request->comment,
        ]);

        return back()->with('success', __('Comment saved successfully'));
    }

    public function uploadImage(Post $post)
    {
        if (array_key_exists('picture', request()->post)) {
            $post->update([
                'picture' => request()->post['picture']->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $post['picture']));
            
            if ($image->width() > $image->height())
            {
                $image->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save();
            }
            else 
            {
                $image->resize(null, 700, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save();
            }
        }
    }

    function deleteImage(Post $post)
    {
        // dd($post);
        if (File::exists('storage/' . $post->picture)) {
            File::delete('storage/' . $post->picture);
        }

        return redirect()
            ->route('post.edit', ['post' => $post])
            ->with('success', __('Post image deleted successfully'));
    }
}