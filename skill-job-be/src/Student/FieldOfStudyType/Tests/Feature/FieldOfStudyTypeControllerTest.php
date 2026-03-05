<?php

namespace Student\FieldOfStudyType\Tests\Feature;

use App\Models\Admin;
use App\Models\FieldOfStudyType;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class FieldOfStudyTypeControllerTest extends TestCase
{
    protected $student;
    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/field-of-study-types');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }
}
