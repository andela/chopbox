<?php

namespace ChopBox\Http\Controllers;


use League\Flysystem\File;

use ChopBox\Comment;
use ChopBox\Favourite;
use Illuminate\Support\Facades\DB;

use ChopBox\Chop;
use ChopBox\helpers\ShortenUrl;
use ChopBox\helpers\UploadFile;
use ChopBox\Http\Requests\ChopsFormRequest;
use ChopBox\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input as Input;
use Validator;
use Response;
use Cloudder;

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

    public function __construct(Chop $chop, ShortenUrl $shortener,
                                UploadFile $upload_file)
    {
        $this->chops = $chop;
        $this->shortener = $shortener;
        $this->upload_file = $upload_file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $chops = Chop::orderBy('updated_at', 'desc')->paginate(8);
        return view('chops.home')->with('chops', $chops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        if (Input::file('image')) {
            $file = array();
            $result = array();
            $url = array();
            $public_id = array();
            $shortened_url = array();

            // Declare an instance of Bitly
            $this->shortener->setLogin(env('BITLY_LOGIN'));
            $this->shortener->setKey(env('BITLY_API_KEY'));
            $this->shortener->setFormat("json");

            // Upload each image to Cloudinary and shorten the url returned with Bitly.
            for ($i = 0; $i < count(Input::file('image')); $i++) {
                $file[$i] = Input::file('image')[$i];
                $result[$i] = $this->upload_file->uploadFile($file[$i]);
                $url[$i] = $result[$i]['url']; //get the url from the cloudinary result;
                $public_id[$i] = $result[$i]['public_id'];
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
        for($i=0; $i < count($file); $i++) {
            $upload = new Upload;
            $upload->name = $file[$i]->getClientOriginalName();
            $upload->mime_type = $file[$i]->getMimeType();
            $upload->file_uri = $shortened_url[$i];
            $upload->public_id = $public_id[$i];
            $upload->chop_id = $this->chops->id;
            $upload->user_id = $user->id;
            $upload->save();
        }

		// Set a flash mesage to display on the page
		$message = 'Success';
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
        $owner_id = Chop::find($id)->user_id;
        $user = Auth::user();

        if($user->id === $owner_id) {
            $chops = Chop::find($id);

            return view('chops.updatechops', compact('chops', 'id'));
        }
        else
            return redirect('chops');
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
