<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    


    protected $fillable = [
          'name', 
          'mime_type',
          'file_uri',
          'created_at'
    ];

    public function chops()
    {
      return $this->belongsTo('ChopBox\Chop');
    }

    public function user()
    {
      return $this->belongsTo('ChopBox\User');
    }

}
