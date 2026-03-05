<?php

namespace Student\IndustryTypes\Tests\Feature;

use App\Models\Admin;
use App\Models\IndustryType;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class IndustryTypeControllerTest extends TestCase
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
            ->json('GET', '/api/student/industry-types');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }
}
