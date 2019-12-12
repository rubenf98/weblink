<?php

namespace App\QueryFilters;

use Cerbero\QueryFilters\QueryFilters;

/**
 * Filter records based on query parameters.
 *
 */
class PostFilters extends QueryFilters
{
    /**
     * Filter records based on the query parameter "search"
     * 
     * @return void
     */

    public function search($string)
    {
        $this->query->where(function ($query) use ($string) {
            $query->where('title', 'like', '%' . $string . '%')
                ->orWhereHas('user', function ($query) use ($string) {
                    $query->where('name', 'like', '%' . $string . '%');
                })
                ->orWhereHas('tag', function ($query) use ($string) {
                    $query->where('name', 'like', '%' . $string . '%');
                });
        });
    }

    public function tech($string)
    {
        $this->query->where(function ($query) use ($string) {
            $query->WhereHas('tag', function ($query) use ($string) {
                $query->where('name', $string);
            });
        });
    }
}
