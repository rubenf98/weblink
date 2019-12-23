<?php

namespace App\QueryFilters;

use Cerbero\QueryFilters\QueryFilters;

/**
 * Filter records based on query parameters.
 *
 */
class TagFilters extends QueryFilters
{
    /**
     * Filter records based on the query parameter "search"
     * 
     * @return void
     */

    public function search($string)
    {
        $this->query->where(function ($query) use ($string) {
            $query->where('name', 'like', '%' . $string . '%');
        });
    }
}
