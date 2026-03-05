<?php

namespace Admin\Students\Tests\Feature;

use App\Models\Certification;
use App\Models\Education;
use App\Models\Project;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentProjectControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_show_method()
    {
        $project = Project::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/projects/' . $project->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'student_id',
            'education_id' ,
            'project_title',
            'project_description',
            'project_links',
            'skills_used'
        ]]);
    }
}
