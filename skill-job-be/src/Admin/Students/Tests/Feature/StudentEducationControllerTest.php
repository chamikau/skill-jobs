<?php

namespace Admin\Students\Tests\Feature;

use App\Models\Certification;
use App\Models\Education;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentEducationControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_show_method()
    {
        $education = Education::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/educations/' . $education->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'student_id',
            'city_id',
            'university_name',
            'course_name',
            'field_of_study_id',
            'grade',
            'start_year',
            'end_year'
        ]]);
    }
}
