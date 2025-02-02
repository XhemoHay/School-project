<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_login(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
    }

    public function test_students(): void
    {
        $response = $this->get('/students');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
