<?php

namespace Admin\Students\Tests\Feature;

use App\Models\Certification;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentCertificationControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_show_method()
    {
        $certification = Certification::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/certifications/' . $certification->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'education_id',
            'student_id',
            'title',
            'start_date',
            'end_date',
            'links'
        ]]);
    }
}
