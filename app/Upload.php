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
      return $this->belongsTo('ChopBox\user');
    }


    public function setChopsIdAttribute($id)
    {
      $this->chops_id = $id;
    }

    public function setUserIdAttribute($id)
    {
      $this->user_id = $id;
    }
}
