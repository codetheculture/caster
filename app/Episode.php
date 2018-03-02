<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    /**
     * Return Series that the Episode is part of
     *
     * @return Series
     */
    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
