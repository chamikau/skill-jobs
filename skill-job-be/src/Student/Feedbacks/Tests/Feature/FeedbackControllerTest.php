<?php

namespace Student\Feedbacks\Tests\Feature;

use App\Models\City;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Education;
use App\Models\Feedback;
use App\Models\FieldOfStudyType;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class FeedbackControllerTest extends TestCase
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
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/feedbacks/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'student_id',
                    'number_of_rating',
                    'message'
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'student_id' => $this->student_id,
            'number_of_rating' => 1,
            'message' => 'test'
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/feedbacks' , $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $feedback = Feedback::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/feedbacks/' . $feedback->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'student_id',
            'number_of_rating',
            'message'
        ]]);
    }

}
