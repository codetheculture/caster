<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadSeriesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->series = factory('App\Series')->create();
    }

    /** @test */
    public function a_user_can_view_all_series()
    {
        $this->get('/series')
            ->assertSee($this->series->title);
    }

    /** @test */
    public function a_user_can_view_a_single_series()
    {
        $this->get($this->series->path())
            ->assertSee($this->series->title);
    }

    /** @test */
    public function a_user_can_see_the_episodes_related_to_a_series()
    {
        $episode = factory('App\Episode')->create(['series_id' => $this->series->id]);

        $this->get($this->series->path())
            ->assertSee($episode->title);
    }
}
