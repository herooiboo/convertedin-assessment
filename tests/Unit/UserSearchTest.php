<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSearchTest extends TestCase
{
    /**
     * Test searching for a user by name.
     *
     * @return void
     */
    public function testUserSearchName()
    {
        // Create a user and get its name
        $user = User::factory()->create();

        // Make a request to the user search endpoint with the user's name
        $response = $this->json('GET', route('users.search'), ['q' => $user->name]);

        // Asserting the response structure
        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'name'],
            ]);

        // Asserting that the response contains the expected user data
        $response->assertJsonFragment([
            'id' => $user->id,
            'name' => $user->name,
        ]);
    }
}