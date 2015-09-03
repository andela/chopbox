<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;


use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
use ChopBox\Chop;

class HomepageController extends Controller
{
    //
  public function index(){

    $all_chops = Chop::all();
    return view('homepage', compact('all_chops'));
  }
}
