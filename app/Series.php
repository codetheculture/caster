<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
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
