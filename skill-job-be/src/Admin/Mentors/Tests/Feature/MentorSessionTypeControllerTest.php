<?php

namespace Admin\Mentors\Tests\Feature;

use App\Models\Admin;
use App\Models\SessionType;
use App\Models\SuperAdmin;
use Tests\TestCase;

class MentorSessionTypeControllerTest extends TestCase
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
            ->json('GET', '/api/admin/session-types');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }
}
