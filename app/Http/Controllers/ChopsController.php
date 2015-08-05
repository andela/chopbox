<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Chop;
use ChopBox\helpers\ShortenUrl;
use ChopBox\helpers\UploadFile;
use ChopBox\Upload;
use Illuminate\Http\Request;

use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Input;
use Cloudder;





class ChopsController extends Controller
{

    /*
     * inject dependencies using the constructor
     */
    private $upload;
    private $chops;
    private $shortener;
    private $upload_file;
    public function __construct(Upload $upload, Chop $chop, ShortenUrl $shortener,
                                UploadFile $upload_file){
        $this->upload = $upload;
        $this->chops = $chop;
        $this->shortener =$shortener;
        $this->upload_file = $upload_file;
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
        return view('chops.newchops');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        //validate the incoming request for errors.
//        $this->validate($request, [
//            'name' => 'required|min:3|max:60',
//            'description' =>'required|max:255'
//            ]);

        //proceed if validation passses.

        $file = NULL;
        $shortened_url = "";
        if(Input::hasfile('image'))
        {

            $file = Input::file('image');
            $result =  $this->upload_file->uploadFile($file);
            if($result) {
                $url = $result['url']; //get the url from the cloudinary result;

                $this->shortener = new ShortenUrl();
                $this->shortener->setLogin(env('BITLY_LOGIN'));
                $this->shortener->setKey(env('BITLY_API_KEY'));
                $this->shortener->setFormat("json");

                $shortened_url = $this->shortener->shortenUrl($url);
            }

        }

        // save chops details to database

        $data = Input::all();
        $this->chops->chops_name = $data['name'];
        $this->chops->about = $data['about'];
        $this->chops->likes = 0;
        $user = Auth::user();
        $this->chops->user_id = $user->id;

        $this->chops->save();

        

        //save upload to database
        $this->upload->name = $file->getClientOriginalName();
        $this->upload->mime_type = $file->getMimeType();
        $this->upload->file_uri = $shortened_url;
        $this->upload->chops_id = $this->chops->id;
        $this->upload->save();
        return $this->upload->id;


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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
