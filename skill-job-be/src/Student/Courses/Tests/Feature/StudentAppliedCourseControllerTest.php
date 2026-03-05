<?php

namespace Student\Courses\Tests\Feature;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourseApply;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentAppliedCourseControllerTest extends TestCase
{
    protected $student;

    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
    }
    public function test_store_method()
    {
        $data = [
            'student_id' => '1',
            'course_id' => '1',
            'state' => 'applied',
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/student-applied-courses', $data);

        $response->assertStatus(201);
        $response->assertJson(['state' => 'applied']);

        $this->assertDatabaseHas('student_course_applies', ['state' => 'applied']);
    }

    public function test_update_method()
    {
        $course = StudentCourseApply::factory()->create();
        $data = [
            'student_id' => $course->student_id,
            'course_id' => $course->course_id,
            'state' => $course->state,
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('PUT', '/api/student/cancel-enrolled-course/' . $this->student->id, $data);
        $response->assertStatus(200);
        $response->dump();
    }



}
