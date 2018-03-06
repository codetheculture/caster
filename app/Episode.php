<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasSlug;

    protected $guarded = [];

    /**
     * Return Series that the Episode is part of
     *
     * @return Series
     */
    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    /**
     * Resolve path for Episode
     *
     * @return string
     */
    public function path()
    {
        return $this->series->path() . '/' . $this->slug;
    }
}
