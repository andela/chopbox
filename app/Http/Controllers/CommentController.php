<?php

namespace ChopBox\Http\Controllers;

use ChopBox\helpers\PostComment;
use Illuminate\Support\Facades\Auth;
use ChopBox\Http\Requests\CommentRequest;
use ChopBox\Http\Controllers\Controller;
use ChopBox\App\Comment;

class CommentController extends Controller
{
    public function addComment(CommentRequest $request, PostComment $comment)
    {
        $user = Auth::user();

        $comment->saveComment($user, $request);
        return redirect()->back();
    }
}
