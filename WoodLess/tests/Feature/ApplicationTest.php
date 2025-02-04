<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use Tests\CreatesApplication;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplicationTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * Test the application returns a successful response
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test the application can enter maintenance mode
     */
    public function test_the_application_can_enter_maintenance_mode(): void
    {
        Artisan::call('down');
        $response = $this->get('/');
        $response->assertStatus(503);
        Artisan::call('up');
    }
}
