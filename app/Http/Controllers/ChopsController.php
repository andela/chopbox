<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;

use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
use Input;
use Cloudder;
use ChopBox\Helpers\ShortenUrl;
use ChopBox\Helpers\Upload;

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

        if(Input::hasfile('image'))
        {
            $upload = new Upload();
            $file = Input::file('image');
            $result =  $upload->uploadFile($file);
            if($result) {

                $url = $result['url']; //get the hosted file url from the result;
                $shortener = new ShortenUrl(); 

                //set bitly credentials
                $shortener->setLogin(env('BITLY_LOGIN'));
                $shortener->setKey(env('BITLY_API_KEY'));
                $shortener->setFormat("json");

                $shortened_url = $shortener->shortenUrl($url);
                dd($shortened_url);
            }else {
                return 'file not uploaded';
            }   

        }
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
