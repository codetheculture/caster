<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SeriesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->series = factory('App\Series')->create();
    }

    /** @test */
    public function a_series_has_a_path()
    {
        $this->assertEquals("/series/{$this->series->slug}", $this->series->path());
    }

    /** @test */
    public function a_series_has_a_creator()
    {
        $this->assertInstanceOf('App\User', $this->series->creator);
    }

    /** @test */
    public function a_series_has_episodes()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->series->episodes);
    }
}
