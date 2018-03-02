<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = [];

    /**
     * Register Events on Model Boot
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($thread) {
            $thread->update(['slug' => $thread->title]);
        });
    }

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
