<?php

namespace Student\WorkExperiences\Tests\Feature;

use App\Models\Student;
use App\Models\WorkExperience;
use App\Models\WorkExperienceJobRole;
use Tests\TestCase;

class WorkExperienceControllerTest extends TestCase
{
    protected $student;
    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
        $this->student_id = $this->student->id;
        $this->work_experience = WorkExperienceJobRole::factory()->create();
        $this->work_experince_id = $this->work_experience->id;

    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/work-experiences/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'student_id',
                    'company_name',
                    'work_experience_job_role_id',
                    'name',
                    'duration',
                    'description',
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'student_id' => $this->student_id,
            'company_name' => 'company abc',
            'work_experience_job_role_id' => $this->work_experince_id,
            'name' => 'chamika',
            'duration' => 10,
            'description' => 'description',
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/work-experiences' , $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $work_experience = WorkExperience::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/work-experiences/' . $work_experience->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'company_name',
            'work_experience_job_role_id',
            'name',
            'duration',
            'description',
        ]]);
    }

    public function test_update_method()
    {

        $work_experience = WorkExperience::factory()->create();

        $data = [
            'student_id' => 1,
            'company_name' => 'company abc',
            'work_experience_job_role_id' => $this->work_experince_id,
            'name' => 'chamika',
            'duration' => 10,
            'description' => 'description',
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('PUT', '/api/student/work-experiences/' . $work_experience->id , $data);
        $response->assertStatus(200);
    }

    public function test_delete_method()
    {
        $work_experience = WorkExperience::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/work-experiences/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->student, 'student')
            ->json('DELETE', '/api/student/work-experiences-records/'.$work_experience->id);
        $delete->assertStatus(200);
    }

}
