<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

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
        Task::factory(3)->create();

        $response = $this->get('tasks');
        $response->assertStatus(200)
            ->assertViewIs('tasks.tasks')
            ->assertViewHas('taskList');
    }

    public function test_user_can_assign_themselves_to_task()
    {

        $tasks = Task::factory(1)->create();
        $user = User::factory()->create();
        $task = $tasks[0];
        $response = $this->actingAs($user)
            ->post(route('tasksPost', $task->id))
            ->assertStatus(200)
            ->assertViewIs('profile')
            ->assertViewHas('user');

    }
}
