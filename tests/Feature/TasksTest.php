<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class tasksTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisteredUsersCanSeeUnsignedTaskList()
    {
        Task::factory(3)->create();
        $user = User::create([
            'name' => 'vanessa',
            'points' => 0,
            'email' => 'van@ff.org',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);

        $response = $this->actingAs($user)
            ->get('tasks');
        $response->assertStatus(200)
            ->assertViewIs('tasks.tasks')
            ->assertViewHas('taskList');
    }

    public function testRegisterUserCanAssignThemselvesToASpecificTask()
    {

        $tasks = Task::factory(1)->create();
        $user = User::factory()->create();
        $task = $tasks[0];
        $response = $this->actingAs($user)
            ->post(route('assignTask', $task->id))
            ->assertStatus(302);

        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id
        ]);
    }
    public function testRegisteredUsersCanMarkSpecificTaskAsDone()
    {
        $tasks = Task::factory(3)->create();
        $user = User::factory()->create();
        $task = $tasks[2];
        $this->actingAs($user)->post(route('assignTask', $task->id));
        $response = $this->post(route('taskDone', $task->id))
            ->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'isCompleted' => true
        ]);
    }
    public function testRegisteredUsersCanMarkSpecificTaskAsUndone()
    {
        $tasks = Task::factory(3)->create();
        $user = User::factory()->create();
        $task = $tasks[2];
        $this->actingAs($user)->post(route('assignTask', $task->id));
        $this->post(route('taskDone', $task->id));
        $response = $this->post(route('taskDone', $task->id))
            ->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'isCompleted' => false
        ]);
    }

    public function testAdultUsersCanCreateTask()
    {
        $data = [
            'title' => "Make Dinner",
            'what' => "Make a vegetarian dinner",
            'deadline' => "2021-12-11",
            'points' => 12,
        ];

        $adult = User::create([
            'name' => 'lorena',
            'role' => 'adult',
            'points' => 0,
            'email' => 'criado@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);

        $response = $this->actingAs($adult)
            ->post(route('save.task', $data))
            ->assertStatus(302);
        $this->assertDatabaseCount('tasks', 1)
            ->assertDatabaseHas('tasks', [
                'title' => "Make Dinner"
            ]);
    }
}
