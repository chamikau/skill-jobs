<?php

namespace Student\Certifications\Tests\Feature;

use App\Models\Admin;
use App\Models\Certification;
use App\Models\MentorEducations;
use App\Models\Student;
use Tests\TestCase;

class CertificationControllerTest extends TestCase
{
    protected $student;

    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
        $this->student_id = $this->student;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/certifications/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'student_id',
                    'title',
                    'start_date',
                    'end_date',
                    'links',
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
                'student_id' => $this->student_id,
                'title' => 'title test',
                'start_date' => '2020-05-05',
                'end_date' => '2020-05-05',
                'links' => 'https://myslt.slt.lk/boardBand'

        ];
        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/certifications/', $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $certification = Certification::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/certifications/' . $certification->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
        ]]);
    }

//    public function test_update_method()
//    {
//
//        $certification = Certification::factory()->create();
//
//        $data = [
//            'title' => 'title test',
//            'start_date' => '2020-05-05',
//            'end_date' => '2020-05-05',
//            'links' => 'https://myslt.slt.lk/boardBand'
//        ];
//
//        $response = $this->actingAs($this->student, 'student')
//            ->json('PUT', '/api/student/certifications' . $certification->id , $data);
//        $response->assertStatus(200);
//        $response->assertJson(['data' => $data]);
//    }

    public function test_delete_method()
    {
        $certification = Certification::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/certifications/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->student, 'student')
            ->json('DELETE', '/api/student/certifications-records/'.$certification->id);
        $delete->assertStatus(200);
    }
}
