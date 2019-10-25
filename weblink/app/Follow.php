<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'follower', 'followed'
    ];

    /**
    * 
    */
    public function follower()
    {
        return $this->belongsTo('App\User', 'id', 'follower');
    }

    /**
    * 
    */
    public function followed()
    {
        return $this->belongsTo('App\User', 'id', 'followed');
    }
}
