<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SeriesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_series_has_a_path()
    {
        $series = factory('App\Series')->create();

        $this->assertEquals("/series/{$series->slug}", $series->path());
    }

    /** @test */
    public function a_series_has_a_creator()
    {
        $series = factory('App\Series')->create();

        $this->assertInstanceOf('App\User', $series->creator);
    }
}
