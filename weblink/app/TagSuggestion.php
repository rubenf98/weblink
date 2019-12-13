<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagSuggestion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'link', 'email'
    ];
}
