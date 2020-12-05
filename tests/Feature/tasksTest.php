<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class tasksTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_task_list()
    {
        $taskList = Task::factory(3)->create();

        $this->assertCount(3, $taskList);

        // it renders the list of tasks

        $response = $this->get('tasks');
        $response->assertStatus(200);

        $taskList = Task::all();

        $response->assertViewHas('taskList', $taskList)
                 ->assertSee($taskList[0]->what);
    }   
}
