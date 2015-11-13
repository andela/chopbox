<?php

namespace ChopBox\Http\Controllers;

use ChopBox\helpers\PostComment;
use Illuminate\Support\Facades\Auth;
use ChopBox\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * Handle post of comments
     *
     * @param CommentRequest $request
     * @param PostComment $comment
     * @return array
     */
    public function addComment(CommentRequest $request, PostComment $comment)
    {
        $user = Auth::user();

        return $comment->saveComment($user, $request);
    }
}
