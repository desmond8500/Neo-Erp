<?php

namespace App;

trait SearchTrait
{
    /**
     * @param String $name
     *
     */

    public function scopeSearch($query, $search, $name = "name")
    {
        return $query->where($name, 'like', '%' . $search . '%')->orderBy($name);
    }

    public function scopeArticleSearch($query, $search)
    {
        return $query->where('designation', 'like', '%' . $search . '%')->orWhere('reference', 'like', '%' . $search . '%');
    }

    public function scopeFavorite($query)
    {
        return $query->where('favorite', 1)->get();
    }
}
