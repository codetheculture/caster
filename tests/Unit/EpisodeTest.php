<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EpisodeTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->episode = factory('App\Episode')->create();
    }

    /** @test */
    public function an_episode_has_a_path()
    {
        $this->assertEquals("/series/{$this->episode->series->slug}/{$this->episode->slug}", $this->episode->path());
    }
}
