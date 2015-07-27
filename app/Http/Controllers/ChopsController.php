<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;

use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
use Input;
use Cloudder;
use ChopBox\Helpers\ShortenUrl;
use ChopBox\Helpers\UploadFile;
use ChopBox\Chop;
use ChopBox\Upload;

class ChopsController extends Controller
{

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
        $file = NULL;
        $shortened_url = "";
        if(Input::hasfile('image'))
        {
            $upload_file = new UploadFile();
            $file = Input::file('image');
            $result =  $upload_file->uploadFile($file);
            if($result) {
                $url = $result['url']; //get the url from the cloudinary result;

                $shortener = new ShortenUrl();
                $shortener->setLogin(env('BITLY_LOGIN'));
                $shortener->setKey(env('BITLY_API_KEY'));
                $shortener->setFormat("json");

                $shortened_url = $shortener->shortenUrl($url);
            }

        }

        // save chops details to database
        $chops = new Chop();
        $data = Input::all();
        $chops->chops_name = $data['name'];
        $chops->about = $data['about'];
        $chops->likes = 0;
        $chops->user_id = 1;

        $chops->save();
        

        //save upload to database
        $upload = new Upload();
        $upload->name = $file->getClientOriginalName();
        $upload->mime_type = $file->getMimeType();
        $upload->file_uri = $shortened_url;
        $upload->chops_id = $chops->id;

        $upload->save();
        return $upload->id;


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
