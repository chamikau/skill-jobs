<?php

namespace Student\Events\Tests\Feature;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Event;
use App\Models\Student;
use App\Models\StudentCourseApply;
use App\Models\StudentEventApply;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentAppliedEventControllerTest extends TestCase
{
    protected $student;

    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
        $this->student_id = $this->student->id;
        $this->event = Event::factory()->create();
        $this->event_id = $this->event->id;
    }
    public function test_store_method()
    {
        $data = [
            'student_id' => $this->student_id,
            'event_id' => $this->event_id,
            'state' => 'applied',
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/student-applied-events', $data);

        $response->assertStatus(201);
        $response->assertJson(['state' => 'applied']);

        $this->assertDatabaseHas('student_event_applies', ['state' => 'applied']);
    }

    public function test_update_method()
    {
        $event = StudentEventApply::factory()->create();
        $data = [
            'student_id' => $this->student_id,
            'event_id' => $this->event_id,
            'state' => $event->state,
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('PUT', '/api/student/cancel-enrolled-events/' . $this->student->id, $data);
        $response->assertStatus(200);
        $response->dump();
    }



}
