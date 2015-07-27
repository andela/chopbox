<?php
namespace ChopBox\helpers;
use Cloudder;

class Upload {


/*
  uploads a file to cloudinary using the clouder helper facade and returns
  the result of the upload to the user or false if it fails;
*/

  public function uploadFile($file) {

    if($file != NULL) {
      Cloudder::upload($file);
      return Cloudder::getResult();
    }else {
      return false;
    }
    
  }
}