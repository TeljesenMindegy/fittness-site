<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Comment $comment, Request $request)
    {
        if (!$comment->is_reply)
        {
            $comment->replies()->create([
                'user_id' => Auth::user()->id,
                'body' => $request->comment,
            ]);
        }
        return back()->with(['success', __('Reply saved successfully')]);
    }
}
