<?php

namespace ChopBox\Http\Controllers;

use ChopBox\helpers\UploadFile;
use ChopBox\Upload;
use Illuminate\Http\Request;

use ChopBox\User;
use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\File;

class UserProfileController extends Controller
{
    private $upload;
    public function __construct(UploadFile $upload)
    {
        $this->upload = $upload;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find(1);

        return view('users.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id, UploadFile $upload)
    {
        $url = "";
        if ($request['file']) {
            $url = $this->uploadImage($request['file']);
        }

        $this->updateUserProfile($request,$id, $url);

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

    private function updateUserProfile(Request $request,$id, $url)
    {
        $user = User::find($id);

        if ($request->has('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->about = $request->get('about');
        $user->location = $request->get('location');
        $user->gender = $request->get('gender');
        $user->best_food = $request->get('best-food');
        $user->about = $request->get('about');
        $user->image_uri = $url;

        $user->save();
    }
}
