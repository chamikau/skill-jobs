<?php

namespace Student\Skills\Tests\Feature;

use App\Models\Student;
use Tests\TestCase;

class SkillsControllerTest extends TestCase
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
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/skills/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name' ,
                ]
            ]
        ]);
    }

}
