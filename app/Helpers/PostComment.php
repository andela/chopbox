<?php

namespace ChopBox\helpers;


use ChopBox\User;
use ChopBox\Comment;
use ChopBox\Http\Requests\CommentRequest;

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
     * @param User $user
     * @param CommentRequest $request
     * @return array
     */
  public function saveComment(User $user, CommentRequest $request)
  {
      $this->comment->comment = $request->comment;
      $this->comment->user_id = $user->id;
      $this->comment->chop_id = $request->chop_id;
      $this->comment->save();

      return ['image_uri' => $user->image_uri,
                'username' => $user->username,
                'user_id' => $user->id,
                'chop_id' => $request->chop_id,
                'comment' => $request->comment
            ];
  }
  
}
