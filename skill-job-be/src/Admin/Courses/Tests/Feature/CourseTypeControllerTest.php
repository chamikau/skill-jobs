<?php

namespace Admin\Courses\Tests\Feature;

use App\Models\Admin;
use App\Models\CourseType;
use App\Models\SuperAdmin;
use Tests\TestCase;

class CourseTypeControllerTest extends TestCase
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
            ->json('GET', '/api/admin/course-types');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }
}
