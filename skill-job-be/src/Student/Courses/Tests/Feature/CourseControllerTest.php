<?php

namespace Student\Courses\Tests\Feature;

use App\Models\Course;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    protected $student;
    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();

    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/courses/');
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

    public function test_show_method()
    {
        $course = Course::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/courses/' . $course->id);

        $response->assertStatus(200);
        $response->dump();
    }



}
