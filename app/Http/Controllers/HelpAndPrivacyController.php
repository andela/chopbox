<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;

use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;

class HelpAndPrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function help()
    {
        return view('pages.help');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function privacy()
    {
        return view('pages.privacy');
    }
}
