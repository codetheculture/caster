<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadEpisodesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->episode = factory('App\Episode')->create();
    }

    /** @test */
    public function a_user_can_view_all_episodes_in_a_series()
    {
        $this->get($this->episode->series->path())
            ->assertSee($this->episode->title);
    }

    /** @test */
    public function a_user_can_view_a_single_episode()
    {
        $this->get($this->episode->path())
            ->assertSee($this->episode->title);
    }
}
