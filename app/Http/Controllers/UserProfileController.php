<?php

namespace ChopBox\Http\Controllers;

use ChopBox\User;
use ChopBox\Upload;
use ChopBox\Http\Requests;
use Illuminate\Http\Request;
use ChopBox\helpers\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use ChopBox\Http\Controllers\Controller;
use ChopBox\ChopBox\Repository\UserRepository;
use Symfony\Component\HttpFoundation\File\File;

class UserProfileController extends Controller
{
     /**
     * @var UploadFile
     */
     private $upload;

     /**
     * @param UploadFile $upload
     */
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
     public function show($id, UserRepository $repository)
     {
        $user   = User::find($id);

        $chops  = $user->chops;

        $topTen = $repository->topUsers();

        return view('pages.homepage', compact('chops', 'topTen', 'user'));
     }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
     public function edit($id)
     {

        $user = User::find($id);

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
        
        $user->about        = $request->get('about');
        $user->location     = $request->get('location');
        $user->gender       = $request->get('gender');
        $user->best_food    = $request->get('best-food');
        $user->about        = $request->get('about');
        $user->image_uri    = $url;

        $user->save();
     }
}
