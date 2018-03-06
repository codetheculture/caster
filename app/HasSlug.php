<?php

namespace App;

trait HasSlug
{
    /**
     * Boot the Trait
     *
     * @return void
     */
    protected static function bootHasSlug()
    {
        static::created(function ($thread) {
            $thread->update(['slug' => $thread->title]);
        });
    }

    /**
     * Set the Slug attribute
     *
     * @param  string $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $slug = str_slug($value);

        if (static::whereSlug($slug)->exists()) {
            $slug = "{$slug}-" . $this->id;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Get Key that Routes match on
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
