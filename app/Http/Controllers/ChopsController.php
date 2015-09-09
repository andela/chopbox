<?php

namespace ChopBox\Http\Controllers;

use ChopBox\Chop;
use ChopBox\helpers\ShortenUrl;
use ChopBox\helpers\UploadFile;
use ChopBox\Http\Requests\ChopsFormRequest;
use ChopBox\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;
use Validator;
use Response;
use Cloudder;

/** Supply name of Cloudinary account for this app.
 * Even though this has been supplied in the env file, Cloudinary cl_image_tag() for retrieving and manipulating the images on view home.blade.php requests for it.
 */
\Cloudinary::config(array(
	"cloud_name" => "chopbox"
));

class ChopsController extends Controller
{
	/*
	 * Inject dependencies using the constructor
	 */
	private $chops;
	private $shortener;
	private $upload_file;

	public function __construct(Chop $chop, ShortenUrl $shortener, UploadFile $upload_file)
	{
		$this->chops = $chop;
		$this->shortener = $shortener;
		$this->upload_file = $upload_file;
	}

	/**
	 * Declare an instance of Bitly
	 *
	 */
	private function setBitlyConfig()
	{
		$this->shortener->setLogin(env('BITLY_LOGIN'));
		$this->shortener->setKey(env('BITLY_API_KEY'));
		$this->shortener->setFormat("json");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 *
	 * @return Response
	 */
	public function store(ChopsFormRequest $request)
	{
		$images = Input::file('image');
		$numImages = count($images);
		if ($images)
		{
			$result = $url = $public_id = $shortened_url = [];
			$this->setBitlyConfig();

			// Upload each image to Cloudinary and shorten the url returned with Bitly.
			for ($i = 0; $i < $numImages; $i++)
			{
				$result[$i] = $this->upload_file->uploadFile($images[$i]);
				$url[$i] = $result[$i]['url']; //get the url from Cloudinary result;
				$shortened_url[$i] = $this->shortener->shortenUrl($url[$i]);
			}
		}

		// Save chop details to database
		$this->chops->about = $request->about;
		$this->chops->likes = 0;
		$user = Auth::user();
		$this->chops->user_id = $user->id;
		$this->chops->save();

		// Save info about the chop image(s) to the uploads table in the database
		for($i=0; $i < $numImages; $i++)
		{
			$upload = new Upload;
			$upload->name = $images[$i]->getClientOriginalName();
			$upload->mime_type = $images[$i]->getMimeType();
			$upload->file_uri = $shortened_url[$i];
			$upload->chop_id = $this->chops->id;
			$upload->user_id = $user->id;
			$upload->save();
		}

		return redirect()->action('HomepageController@index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{   $chops = Chop::find($id);
		$owner_id = $chops->user_id;
		$user = Auth::user();
		if($user->id === $owner_id)
		{
			return view('chops.updatechops', compact('chops', 'id'));
		}
		else
		{
			return redirect('chops');
		}
	}

	/**
	 *
	 *
	 */
	public function update()
	{
		//
	}
}