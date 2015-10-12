<?php

namespace ChopBox\Http\Controllers;

class AboutTermsController extends Controller
{
    /**
     * Direct to the about page
     *
     * @return Response
     */
    public function about()
    {
        return view('pages.about');
    }
    /**
     * Direct to the terms page
     *
     * @return Response
     */
    public function terms()
    {
        return view('pages.terms');
    }
}