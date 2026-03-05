<?php

namespace Student\Events\Tests\Feature;

use App\Models\City;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Education;
use App\Models\Event;
use App\Models\FieldOfStudyType;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    protected $student;
    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
        $this->student_id = $this->student->id;

    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/events/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'created_by',
                    'event_type_id',
                    'name',
                    'event_organizer',
                    'date',
                    'location',
                    'description'
                ]
            ]
        ]);
    }

    public function test_show_method()
    {
        $event = Event::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/events/' . $event->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'user_id_and_applicant_list_match'
        ]]);
    }


}
