<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Follow;
use ChopBox\User;
use ChopBox\Http\Requests;
use Illuminate\Http\Request;
use ChopBox\helpers\UploadFile;
use Illuminate\Support\Facades\Auth;
use ChopBox\ChopBox\Repository\UserRepository;
use Symfony\Component\HttpFoundation\File\File;
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

        return view('users.profile', compact('user'));
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
            $url = $this->uploadImage($request['file']);
        }

        $this->updateUserProfile($request, $id, $url);

        return redirect()->action('HomeController@index');
    }

    /**
     * @param File $file
     * @return mixed
     */
    private function uploadImage(File $file)
    {
        $result = $this->upload->uploadFile($file);

        return $result['url'];
    }

    /**
     * @param Request $request
     * @param $id
     * @param $url
     */
    private function updateUserProfile(Request $request, $id, $url)
    {
        $user = User::find($id);
        $user->about        = $request->get('about');
        $user->location     = $request->get('location');
        $user->gender       = $request->get('gender');
        $user->best_food    = $request->get('best-food');
        $user->about        = $request->get('about');
        $user->image_uri    = $url;
        $user->save();
    }
}
