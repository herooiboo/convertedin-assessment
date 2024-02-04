<?php

namespace Tests\Unit;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

//use PHPUnit\Framework\TestCase;

class TaskCreationTest extends TestCase
{

    /**
     * Test to ensure that tasks are created successfully when the admin submits the task creation form.
     *
     * @return void
     */
    public function testTaskCreation()
    {
        // Arrange: Set up necessary data for the test, such as an admin and user
        $admin = Admin::factory()->create();
        $user = User::factory()->create();

        // Act: Simulate the task creation request
        $response = $this->actingAs($admin)
            ->post(route('tasks.store'), [
                'admin_id' => $admin->id,
                'title' => 'Sample Task',
                'description' => 'Task description',
                'assigned_to_id' => $user->id,
                'assigned_by_id' => $admin->id,
            ]);

        // Assert: Check if the task is created successfully
        $response->assertStatus(302); // the redirection after successful creation
        $this->assertDatabaseHas('tasks', [
            'title' => 'Sample Task', 'assigned_to_id' => $user->id,
            'assigned_by_id' => $admin->id,
        ]);
    }
}