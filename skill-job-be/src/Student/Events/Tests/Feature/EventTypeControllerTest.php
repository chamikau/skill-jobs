<?php

namespace Student\Events\Tests\Feature;

use App\Models\Student;
use Tests\TestCase;

class EventTypeControllerTest extends TestCase
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
            ->json('GET', '/api/student/event-types');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }
}
