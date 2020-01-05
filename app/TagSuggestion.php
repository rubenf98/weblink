<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cerbero\QueryFilters\FiltersRecords;

class TagSuggestion extends Model
{
    use FiltersRecords;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'link', 'email'
    ];
}
