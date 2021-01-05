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
        $response = $this->get(route('userTasks', $user->id))
            ->assertStatus(200)
            ->assertViewIs('users.userTasks');
    }

    public function testRegisteredUsersGeTPointsWhenMarkTaskAsDone()
    {
        $tasks = Task::factory(1)->create();
        $user = User::factory()->create();
        $task = $tasks[0];
        $points = $task->points;
        $this->actingAs($user)->post(route('tasksPost', $task->id));

        $response = $this->post(route('taskDone', $task->id));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'points' => $task->points
        ]);
    }
}
