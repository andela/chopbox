<?php

namespace ChopBox\helpers;

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
  public function saveComment(CommentRequest $request)
  {
    $this->comment->comment = $request->comment;
    $this->comment->user_id = $request->user_id;
    $this->comment->chop_id = $request->chop_id;
    $this->comment->save();
  }
}
