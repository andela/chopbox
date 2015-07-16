<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Follower extends Model
{
    


    public function user() {

        return $this->belongsTo('User');
        
    }
}
