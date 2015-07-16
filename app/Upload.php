<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\Chop;

class Upload extends Model
{
    
    private $filename;
    private $file_uri;
    private $chops_id;
    private $user_id;
    private $mime_type;


    protected $fillable = [
                'filename' , 
                'mime_type', 
                'file_uri'
          ];



    public function __construct($$filename, $uri, $mime_type)
    {

    }

     
    public function chop() {

      return $this->belongsTo('Chop');

    }


    /*

     *  Set some attributes. The attributes set here are additional parameters
     *  thamt might be added to the class instance to serve some purposes.
     *  Some uploads may be user profile pics ans some chops images.
     *  Since this can be any of the two, The parameter should be
     *  explicitly to avoid database conflicts
     *
    */
    public function setChopsIdAttribute($chops_id)
    {
      $this->chops_id = $chops_id;
    }

    public function  setUserIdAttributes($user_id)
    {
      $this->user_id = $user_id;
    }


    /*
     * Save object to database
    */

    public function persist()
    {
      $this->save();
    }
}
