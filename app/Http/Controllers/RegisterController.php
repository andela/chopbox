<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;

use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
Use ChopBox\User;


class RegisterController extends Controller
{
    //



  public function create(Request $request)
  {
    

    $user = new User();
    $user->persist($request);
  }
}
