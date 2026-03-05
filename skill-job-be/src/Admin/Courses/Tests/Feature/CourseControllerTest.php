<?php

namespace Admin\Courses\Tests\Feature;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\SuperAdmin;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin->id;
        $this->course_type = CourseType::factory()->create();
        $this->course_type_id = $this->course_type->id;

    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/courses/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'course_type_id',
                    'name',
                    'instructor_name',
                    'instructor_description',
                    'description'
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'created_by' => $this->admin_id,
            'course_type_id' => $this->course_type_id,
            'name' => 'sdf',
            'instructor_name' => 'fsd',
            'instructor_description' => 'sdf',
            'description' => 'sdf',
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('POST', '/api/admin/courses' , $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $course = Course::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/courses/' . $course->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'created_by', 'course_type_id', 'name', 'instructor_name' , 'instructor_description' , 'description'
        ]]);
    }

    public function test_update_method()
    {

        $course = Course::factory()->create();

        $data = [
            'course_type_id' => $this->course_type_id,
            'name' => 'sdf',
            'instructor_name' => 'fsd',
            'instructor_description' => 'sdf',
            'description' => 'sdf',
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('PUT', '/api/admin/courses/' . $course->id , $data);
        $response->assertStatus(200);
        $response->assertJson(['data' => $data]);
    }


}
