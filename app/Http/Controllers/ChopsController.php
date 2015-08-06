<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Chop;
use ChopBox\helpers\ShortenUrl;
use ChopBox\helpers\UploadFile;
use ChopBox\Http\Requests\ChopsFormRequest;
use ChopBox\Upload;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
		$chops = Chop::all()->toArray();
		return view('chops.home', compact('chops'));
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
	public function store(ChopsFormRequest $request)
	{

		$file = NULL;
		$shortened_url = "";
		if($request->image)
		{

			$file = $request->image;
			$result =  $this->upload_file->uploadFile($file);
			
			if($result) {
				$url = $result['url']; //get the url from the cloudinary result;

				$this->shortener->setLogin(env('BITLY_LOGIN'));
				$this->shortener->setKey(env('BITLY_API_KEY'));
				$this->shortener->setFormat("json");

				$shortened_url = $this->shortener->shortenUrl($url);
			}

		}

		// save chops details to database


		$this->chops->chops_name = $request->name;
		$this->chops->about = $request->about;
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

		//set a flash mesage to display on the page
		$message = 'Your chops has been posted';
		return redirect(route('chops.index', $message));


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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
