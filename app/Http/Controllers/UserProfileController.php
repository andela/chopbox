<?php

namespace ChopBox\Http\Controllers;

use ChopBox\User;
use ChopBox\Follow;
use ChopBox\Http\Requests;
use Illuminate\Http\Request;
use ChopBox\helpers\UploadFile;
use Illuminate\Support\Facades\Auth;
use ChopBox\ChopBox\Repository\UserRepository;
use ChopBox\ChopBox\Repository\ChopsRepository;
use ChopBox\ChopBox\Repository\CommentsRepository;

class UserProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param UserRepository $repository
     * @return \Illuminate\View\View
     */
    public function show($id, UserRepository $repository, ChopsRepository $chopsRepo, CommentsRepository $commentRepo)
    {
        $user   = User::find($id);

        $chops  = $user->chops;

        $topTen = $repository->topUsers();

        $followStatus = Follow::where('follower_id', Auth::user()->id)->where('followee_id', $id)->first() ? 1 : 0;

        return view('pages.homepage', compact('chops', 'topTen', 'user', 'chopsRepo', 'commentRepo', 'followStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (Auth::user() == $user) {
            return view('users.profile', compact('user'));
        }

        return redirect()->action('HomeController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @param UploadFile $upload
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id, UploadFile $upload)
    {
        $url = User::find($id)->image_uri;

        if ($request['file']) {
            $url = $upload->uploadFile($request['file'])['url'];
        }

        $this->updateUserProfile($request, $id, $url);

        return redirect()->action('HomeController@index');
    }

    /**
     * Handle user's profile update
     *
     * @param Request $request
     * @param $id
     * @param $url
     */
    private function updateUserProfile(Request $request, $id, $url)
    {
        $user = User::find($id);

        $user->image_uri    = $url;
        $user->username     = $request->get('username');
        $user->location     = $request->get('location');
        $user->best_food    = $request->get('best-food');
        $user->gender       = $request->get('gender');
        $user->about        = $request->get('about');
        $user->save();
    }
}
