<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SeriesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_all_series()
    {
        $series = factory('App\Series')->create();

        $this->get('/series')
            ->assertSee($series->title);
    }

    /** @test */
    public function a_user_can_view_a_single_series()
    {
        $series = factory('App\Series')->create();

        $this->get($series->path())
            ->assertSee($series->title);
    }
}
