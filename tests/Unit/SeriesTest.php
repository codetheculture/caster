<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SeriesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function has_an_owner()
    {
        $series = factory('App\Series')->create();

        $this->assertInstanceOf('App\User', $series->owner);
    }
}
