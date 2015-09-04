<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;


use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
use ChopBox\Chop;
use ChopBox\User;

class HomepageController extends Controller
{
    //
  public function index(){

    $all_chops = Chop::all();
	  $all_users = User::all();
    return view('homepage', compact('all_chops', 'all_users'));
  }
}
