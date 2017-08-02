<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeRoute()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSearchRoute()
    {
        $response = $this->get('/search');

        $response->assertStatus(200);
    }

    public function testInvalidRoute()
    {
        $response = $this->get('/invalid');

        $response->assertStatus(404);
    }
}
