<?php

namespace ChopBox\helpers;


use ChopBox\User;
use ChopBox\Http\Requests\CommentRequest;
use ChopBox\Comment;

class PostComment
{

  private $comment;

  public function __construct(Comment $comment)
  {
    $this->comment = $comment;
  }

  /**
   * Save chops in the database
   *
   * @param $request
   */
  public function saveComment(User $user, CommentRequest $request)
  {
    $this->comment->comment = $request->comment;
    $this->comment->user_id = $user->id;
    $this->comment->chop_id = $request->chop_id;
    $this->comment->save();
  }
  
}
