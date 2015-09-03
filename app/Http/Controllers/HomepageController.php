<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;

use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;

class HomepageController extends Controller
{
    //
  public function index(){
    return view('homepage');
  }
}
