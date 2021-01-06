<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class AdultTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdultUsersCanSeeTaskList()
    {
        $this->withoutExceptionHandling();
        Task::factory(3)->create();
        $adult = User::create([
            'name' => 'lorena',
            'role' => 'adult',
            'points' => 0,
            'email' => 'criado@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);

        $response = $this->actingAs($adult)
            ->get(route('dashboard.tasks'));
        $response->assertStatus(200)
            ->assertViewIs('dashboard.taskList')
            ->assertViewHas('taskList');
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

    public function testAdultUsersCanDeleteTask()
    {
        $this->withoutExceptionHandling();

        $task = Task::factory()->create();
        $adult = User::create([
            'name' => 'lorena',
            'role' => 'adult',
            'points' => 0,
            'email' => 'criado@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10)
        ]);

        $response = $this->actingAs($adult)
        ->delete(route('delete.task', $task->id))
        ->assertStatus(302);
        $this->assertDatabaseCount('tasks', 0);
    }

}