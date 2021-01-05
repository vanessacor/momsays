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
        $this->actingAs($user)->post(route('assignTask', $task->id));
        $response = $this->get(route('userTasks', $user->id))
            ->assertStatus(200)
            ->assertViewIs('users.userTasks');
    }

    public function testRegisteredUsersGeTPointsWhenMarkTaskAsDone()
    {
        $tasks = Task::factory(1)->create();
        $user = User::factory()->create();
        $task = $tasks[0];
        $this->actingAs($user)->post(route('assignTask', $task->id));
        $this->post(route('taskDone', $task->id));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'points' => $task->points
        ]);
    }


    public function testRegisteredUsersLoosePointsWhenMarkTaskAsUndone()
    {
        $tasks = Task::factory(1)->create();
        $user = User::create([
            'name' => 'vanessa',
            'points' => 10,
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);
        $task = $tasks[0];
        $this->actingAs($user)->post(route('assignTask', $task->id));
        $this->post(route('taskDone', $task->id));

        $this->post(route('taskDone', $task->id));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'points' => 10
        ]);
    }
}
