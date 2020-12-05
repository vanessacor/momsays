<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class tasksTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_show_task_list()
    {
        Tasks::factory(3)->create();

        // the route is correct
        // it calls the right view
        // the view has list of tasks
        // it renders the list of tasks
        
        $response = $this->get('/home');

        $response->assertStatus(200);

    }
}
