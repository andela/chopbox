<?php

namespace ChopBox\Http\Controllers;


class AboutTermsController extends Controller
{
    /**
     * Get the About page.
     *
     * @return Response
     */
    public function about()
    {
        return view('about');
    }

	/**
	 * Get the Terms of Service page.
	 *
	 * @return Response
	 */
	public function terms()
	{
		return view('terms');
	}
}
