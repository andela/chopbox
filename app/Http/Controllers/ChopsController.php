<?php

namespace ChopBox\Http\Controllers;

use Illuminate\Http\Request;

use ChopBox\Http\Requests;
use ChopBox\Http\Controllers\Controller;
use Input;
use Cloudder;
use ChopBox\Helpers\ShortenUrl;

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
            $file = Input::file('image');
            $file_name = $file->getClientOriginalName();
            Cloudder::upload($file);
            
            $result = Cloudder::getResult();
            $url = $result['url'];
            $shortener = new ShortenUrl();
            $shortener->setLogin("o_4dlm5gnl5m");
            $shortener->setKey( "R_639b43ad856942c79de4c843583e3a51");
            $shortener->setFormat("json");
            $shortened_url = $shortener->shortenUrl($url);
            dd($shortened_url);

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
