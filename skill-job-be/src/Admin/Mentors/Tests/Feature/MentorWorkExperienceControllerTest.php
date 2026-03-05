<?php

namespace Admin\Mentors\Tests\Feature;

use App\Models\Admin;
use App\Models\Mentor;
use App\Models\MentorWorkExperiences;
use App\Models\SessionType;
use App\Models\SuperAdmin;
use App\Models\WorkExperienceJobRole;
use Tests\TestCase;

class MentorWorkExperienceControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin->id;
        $this->mentor = Mentor::factory()->create();
        $this->mentor_id = $this->mentor->id;
        $this->work_experience_type = WorkExperienceJobRole::factory()->create();
        $this->work_experience_type_id = $this->work_experience_type->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/mentor-work-experiences/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'mentor_id',
                    'work_experience_job_role_id',
                    'name',
                    'start_date',
                    'end_date',
                    'description'
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'created_by' => $this->admin_id,
            'mentor_id' => $this->mentor_id,
            'work_experience_job_role_id' => $this->work_experience_type_id,
            'name' => 'chami',
            'start_date' => '2020-02-02',
            'end_date'  =>  '2021-02-02',
            'description' => 'description test'
        ];
        $response = $this->actingAs($this->admin, 'admin')
            ->json('POST', '/api/admin/mentor-work-experiences', $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $work_experiences = MentorWorkExperiences::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/mentor-work-experiences/' . $work_experiences->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'mentor_id',
            'work_experience_job_role_id',
            'name',
            'start_date',
            'end_date',
            'description'
        ]]);
    }

    public function test_update_method()
    {

        $work_experiences = MentorWorkExperiences::factory()->create();

        $data = [
            'mentor_id' => $this->mentor_id,
            'work_experience_job_role_id' => $this->work_experience_type_id,
            'name' => 'chami',
            'start_date' => '2020-02-02',
            'end_date'  =>  '2021-02-02',
            'description' => 'description test'
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('PUT', '/api/admin/update-mentor-work-experiences/' . $work_experiences->id , $data);
        $response->assertStatus(200);
        $response->assertJson(['data' => $data]);
    }

    public function test_delete_method()
    {
        $work_experiences = MentorWorkExperiences::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/mentor-work-experiences/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->admin, 'admin')
            ->json('DELETE', '/api/admin/work-experiences-records/'.$work_experiences->id);
        $delete->assertStatus(200);
    }
}
