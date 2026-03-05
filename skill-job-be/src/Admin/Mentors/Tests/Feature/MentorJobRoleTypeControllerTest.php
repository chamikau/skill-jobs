<?php

namespace Admin\Mentors\Tests\Feature;

use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\WorkExperienceJobRole;
use Tests\TestCase;

class MentorJobRoleTypeControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/get-mentor-job-role-types');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }
}
