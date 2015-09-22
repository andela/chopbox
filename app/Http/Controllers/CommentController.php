<?php

namespace ChopBox\Http\Controllers;

use ChopBox\helpers\PostComment;
use ChopBox\Http\Requests\CommentRequest;
use ChopBox\Http\Controllers\Controller;
use ChopBox\App\Comment;

class CommentController extends Controller
{
  public function addComment(CommentRequest $request, PostComment $comment)
  {
    $comment->saveComment($request);
    return redirect()->action('HomeController@index');
  }
}
