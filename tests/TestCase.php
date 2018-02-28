<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Debug\ExceptionHandler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup TestCase
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        DB::statement('PRAGMA foreign_keys=on;');

        $this->disableExceptionHandling();
    }

    /**
     * Sign in a given USer
     *
     * @param User|null $user
     * @return User|null
     */
    public function signIn($user = null)
    {
        $user = $user ?: create('App\User');

        $this->actingAs($user);

        return $this;
    }

    /**
     * Disable exception handling by default
     *
     * @return void
     */
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }

    /**
     * Re-enable exception handling
     *
     * @return void
     */
    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }
}
