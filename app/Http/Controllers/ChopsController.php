<?php

namespace ChopBox\Http\Controllers;

use ChopBox\helpers\PostChop;
use Illuminate\Support\Facades\Auth;
use ChopBox\Http\Requests\ChopsFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Input as Input;

class ChopsController extends Controller
{
    /**
     * Store posted chops
     *
     * @param ChopsFormRequest $request
     *
     * @param PostChop $post
     *
     * @return Response Redirect to homepage view
     */
    public function store(ChopsFormRequest $request, PostChop $post)
    {
        $user = Auth::user();

        $images = Input::file('image');
        $chopsId = $post->saveChops($user, $request);

        if (! is_null($images[0])) {
            $shortened_url = $post->uploadImages($images);
            $post->saveUploads($user, $images, $shortened_url, $chopsId);
        }
        
        return redirect()->action('HomeController@index');
    }
}
