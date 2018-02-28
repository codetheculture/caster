<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    /**
     * Return Owner of Series
     *
     * @return User
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return Episodes related to the Series
     *
     * @return Collection
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    /**
     * Resolve path for Series
     *
     * @return string
     */
    public function path()
    {
        return '/series/' . $this->id;
    }
}
