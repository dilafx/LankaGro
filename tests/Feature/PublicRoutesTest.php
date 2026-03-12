<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    use RefreshDatabase; // Resets the database after the test runs

    public function test_home_page_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_calculator_page_loads_successfully()
    {
        $response = $this->get('/calculator');
        $response->assertStatus(200);
    }

    public function test_events_page_loads_successfully()
    {
        $response = $this->get('/events');
        $response->assertStatus(200);
    }

    public function test_news_page_loads_successfully()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function test_solutions_page_loads_successfully()
    {
        $response = $this->get('/solutions');
        $response->assertStatus(200);
    }

    public function test_tutorial_page_loads_successfully()
    {
        $response = $this->get('/tutorial');
        $response->assertStatus(200);
    }
}
