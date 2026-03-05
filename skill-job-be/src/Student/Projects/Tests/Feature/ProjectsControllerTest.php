<?php

namespace Student\Projects\Tests\Feature;

use App\Models\Project;
use App\Models\Student;
use Tests\TestCase;

class ProjectsControllerTest extends TestCase
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
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/projects/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'student_id',
                    'education_id',
                    'project_title',
                    'project_description',
                    'project_links',
                    'skills_used'
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'student_id' => $this->student_id,
            'education_id' => 1,
            'project_title' => 'project tile test',
            'project_description' =>'project tile test',
            'project_links' => 'https://www.youtube.com/',
            'skills_used' => 'php'
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/projects' , $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $project = Project::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/projects/' . $project->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'student_id',
            'education_id',
            'project_title',
            'project_description',
            'project_links',
            'skills_used'
        ]]);
    }

    public function test_update_method()
    {

        $project = Project::factory()->create();

        $data = [
            'project_title' => 'project tile test',
            'project_description' =>'project tile test',
            'project_links' => 'https://www.youtube.com/',
            'skills_used' => 'php'
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('PUT', '/api/student/projects/' . $project->id , $data);
        $response->assertStatus(200);
    }

    public function test_delete_method()
    {
        $project = Project::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/projects/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->student, 'student')
            ->json('DELETE', '/api/student/projects-records/'.$project->id);
        $delete->assertStatus(200);
    }

}
