<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 12/11/15
 * Time: 3:08 PM
 */

namespace ChopBox\ChopBox\Repository;


use ChopBox\Comment;

class CommentsRepository {



    public function getCommentTime($commentId)
    {
        $comment = Comment::find($commentId);

        return $comment->created_at->diffForHumans();
    }
}