<?php

namespace Student\Cities\Tests\Feature;

use App\Models\Admin;
use App\Models\Job;
use App\Models\Student;
use Tests\TestCase;

class CityControllerTest extends TestCase
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
            ->json('GET', '/api/student/cities');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name'
                ]
            ]
        ]);
    }

}
