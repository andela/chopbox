<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Comment;
use ChopBox\Http\Requests;
use Illuminate\Http\Request;
use ChopBox\helpers\PostComment;
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


    public function find($id)
    {
        $comment = Comment::find($id);

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json(['message' => 'Comment removed']);

    }


    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $comment = Comment::find($id);
            $comment->comment = $request->get('comment');
            $comment->save();

            return response()->json(['comment'=> $comment]);
        }


        return redirect()->back();
    }
}
