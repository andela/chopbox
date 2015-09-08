<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Http\Requests;
use ChopBox\Chop;
use ChopBox\User;
Use ChopBox\Upload;
use ChopBox\Follow;
use Illuminate\Support\Facades\Auth;



class HomepageController extends Controller
{
    //
  public function index(){

    $all_chops = Chop::all();
	  $all_users = User::all();
	  $user = Auth::user();
    $follows = Follow::all(); 
    $uploads = Upload::all();
    return view('homepage', compact('all_chops', 'all_users', 'user', 'follows', 'uploads'));
  }
}
