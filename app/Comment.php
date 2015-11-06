<?php

namespace ChopBox;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'comment'
    ];

    public function user()
    {
        return $this->belongsTo('ChopBox\User');
    }

    public function chops()
    {
        return $this->belongsTo('ChopBox\Chop');
    }
}
