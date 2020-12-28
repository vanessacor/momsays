<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class userTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisteredUsersCanSeeAllTaskAssignedToThem()
    {
        $tasks = Task::factory(1)->create();
        $user = User::factory()->create();
        $task = $tasks[0];
        $this->actingAs($user)->post(route('tasksPost', $task->id));
        $response = $this->get(route('profile', $user->id))
            ->assertStatus(200)
            ->assertViewIs('profile');
    }
    public function testRegisteredUsersCanMarkSpecificTaskAsDone()
    {
        $tasks = Task::factory(3)->create();
        $user = User::factory()->create();
        $task = $tasks[2];
        $this->actingAs($user)->post(route('tasksPost', $task->id));
        $response = $this->post(route('taskDone', $task->id))
            ->assertStatus(302);
            $this->assertDatabaseHas('tasks', [
                'isCompleted' => true ])            ;
    }
}
