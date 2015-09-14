<?php

namespace ChopBox\helpers;

use ChopBox\Upload;

class PostChop
{
    private $chops;
    private $shortener;
    private $upload_file;

    public function __construct($chop, $shortener, $upload_file)
    {
        $this->chops = $chop;
        $this->shortener = $shortener;
        $this->upload_file = $upload_file;
    }

    /**
     * Setup configuration for Bitly
     *
     */
    private function setBitlyConfig()
    {
        $this->shortener->setLogin(env('BITLY_LOGIN'));
        $this->shortener->setKey(env('BITLY_API_KEY'));
        $this->shortener->setFormat("json");
    }

    /**
     * Upload images of a chop to Cloudinary
     *
     * @param array $images Images for a chop
     *
     * @return array $shortened_url Shortened URL for all uploaded images of a chop
     */
    public function uploadImages($images)
    {
        if ($images) {
            $numImages = count($images);
            $result = $url = $shortened_url = [];
            $this->setBitlyConfig();

            // Upload each image to Cloudinary and shorten the url returned with Bitly.
            for ($i = 0; $i < $numImages; $i++) {
                $result[$i] = $this->upload_file->uploadFile($images[$i]);
                $url[$i] = $result[$i]['url']; //get the url from Cloudinary result;
                $shortened_url[$i] = $this->shortener->shortenUrl($url[$i]);
            }

            return $shortened_url;
        }
    }

    /**
     * Save info of uploaded images to database
     *
     * @param $user Authenticated user
     *
     * @param array $images Uploaded images
     *
     * @param array $shortened_url Shortened URL for all uploaded images of a chop
     */
    public function saveUploads($user, $images, $shortened_url)
    {
        $numImages = count($images);

        // Save info about the chop image(s) to the uploads table in the database
        for ($i=0; $i < $numImages; $i++) {
            $upload = new Upload;
            $upload->name = $images[$i]->getClientOriginalName();
            $upload->mime_type = $images[$i]->getMimeType();
            $upload->file_uri = $shortened_url[$i];
            $upload->chop_id = $this->chops->id;
            $upload->user_id = $user->id;
            $upload->save();
        }
    }

    /**
     * Save chops in the database
     *
     * @param $user Authenticated user
     *
     * @param $request
     */
    public function saveChops($user, $request)
    {
        // Save chop details to database
        $this->chops->about = $request->about;
        $this->chops->likes = 0;
        $this->chops->user_id = $user->id;
        $this->chops->save();

        $user->chops_count++;
        $user->save();
    }
}
