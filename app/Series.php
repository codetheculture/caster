<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasSlug;

    protected $guarded = [];

    /**
     * Return Creator of Series
     *
     * @return User
     */
    public function creator()
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
        return '/series/' . $this->slug;
    }
}
