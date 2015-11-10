<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Chop;
use ChopBox\User;
use ChopBox\Favourite;
use ChopBox\helpers\PostChop;
use Illuminate\Support\Facades\Auth;
use ChopBox\Http\Requests\ChopsFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Input as Input;
use ChopBox\ChopBox\Repository\ChopsRepository;

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

     /**
     * Editing any posted chop by the user that posted it
     *
     * @param ChopsFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function update(ChopsFormRequest $request)
     {
        $chop_id = $request['chop_id'];
        $chop = Chop::find($chop_id);
        $chop->about = $request['about'];
        $chop->save();
        return redirect()->action('HomeController@index');
     }

     /**
     * Deleting any posted chop by the user that posted it
     *
     * @param ChopsFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function destroy(ChopsFormRequest $request)
     {
        $user_id = $request['user_id'];
        $chop_id = $request['chop_id'];
        Chop::destroy($chop_id);
        $user = User::find($user_id);
        $user->chops_count = $user['chops_count'] - 1;
        $user->save();
        return redirect()->action('HomeController@index');
     }

     /**
     * Favourite a chop and store the details
     *
     * @param $id
     * @param Favourite $favourite
     * @param ChopsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
     public function favourite($id, Favourite $favourite, ChopsRepository $repository)
     {
        $user = Auth::user();

        $favourite->chop_id = $id;
        $favourite->user_id = $user->id;
        $favourite->save();

        $repository->addLikeToChop($id);
        $favouriteCount = $repository->getFavourites($id);

        return response()->json(['count' => $favouriteCount]);
     }



}
