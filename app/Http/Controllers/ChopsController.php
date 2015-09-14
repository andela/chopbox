<?php

namespace ChopBox\Http\Controllers;

use League\Flysystem\File;
use ChopBox\Chop;
use ChopBox\helpers\ShortenUrl;
use ChopBox\helpers\UploadFile;
use ChopBox\helpers\PostChop;
use ChopBox\Http\Requests\ChopsFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;

class ChopsController extends Controller
{
    /**
     * Store posted chops
     *
     * @param  Request $request
     *
     * @return Response Redirect to homepage view
     */
    public function store(ChopsFormRequest $request)
    {
        $user = Auth::user();
        $images = Input::file('image');

        $postChop = new PostChop(new Chop, new ShortenUrl, new UploadFile);

        $shortened_url = $postChop->uploadImages($images);

        $postChop->saveChops($user, $request);

        $postChop->saveUploads($user, $images, $shortened_url);

        return redirect()->action('HomeController@index');
    }
}
