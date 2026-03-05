<?php

namespace Admin\Courses\Tests\Feature;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentAppliedCourseControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_show_method()
    {
        $course = Course::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/student-applied-courses/' . $course->id);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => []
        ]);
    }



}
