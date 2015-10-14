<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Chop;
use ChopBox\helpers\PostChop;

use ChopBox\Http\Requests\ChopsFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;
use Symfony\Component\HttpFoundation\Request;

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
        $images = null;
        if ($request->ajax()) {
            $images = Input::get('images');
            $chopsId = $post->saveChops($user, $request);

            if (! is_null($images[0])) {
                $shortened_url = $post->uploadImages($images);
                $post->saveUploads($user, $images, $shortened_url, $chopsId);
            }

            //return redirect()->action('HomeController@index');
        }

        return redirect()->action('HomeController@index');

    }

    public function update(ChopsFormRequest $request)
    {

        $chop_id = $request['chop_id'];

        $chop = Chop::find($chop_id);

        $chop->about = $request['about'];

        $chop->save();

        return redirect()->action('HomeController@index');
    }
}
