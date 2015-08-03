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
use League\Flysystem\File;

class ChopsController extends Controller
{

    private $file;
    private $upload_file;
    private $shortener;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct(UploadFile $uploadFile, ShortenUrl $shortenUrl) {
        $this->upload_file = $uploadFile;
        $this->shortener = $shortenUrl;
        //$this->file = $file;
    }
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
        $shortened_url = "";
        if(Input::hasfile('image'))
        {

            $this->file = Input::file('image');
            $result =  $this->upload_file->uploadFile($this->file);
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
        $chops = new Chop();
        $data = Input::all();
        $chops->chops_name = $data['name'];
        $chops->about = $data['about'];
        $chops->likes = 0;
        $chops->user_id = 1;

        $chops->save();

        //echo $chops->id;
        //exit;
        

        //save upload to database
        $upload = new Upload();
        $upload->name = $this->file->getClientOriginalName();
        $upload->mime_type = $this->file->getMimeType();
        $upload->file_uri = $shortened_url;
        $upload->chops_id = $chops->id;
        $upload->user_id = 1;

        $upload->save();

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
