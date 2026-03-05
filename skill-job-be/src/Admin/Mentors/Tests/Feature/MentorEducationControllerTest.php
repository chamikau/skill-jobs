<?php

namespace Admin\Mentors\Tests\Feature;

use App\Models\Admin;
use App\Models\City;
use App\Models\FieldOfStudyType;
use App\Models\Mentor;
use App\Models\MentorEducations;
use App\Models\SuperAdmin;
use Tests\TestCase;

class MentorEducationsEducationControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin->id;
        $this->mentor = Mentor::factory()->create();
        $this->mentor_id = $this->mentor->id;
        $this->city = City::factory()->create();
        $this->city_id = $this->city->id;
        $this->study_field = FieldOfStudyType::factory()->create();
        $this->study_field_id = $this->study_field->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/mentor-educations/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'mentor_id',
                    'city_id',
                    'field_of_study_id',
                    'university_name',
                    'course_name',
                    'start_year',
                    'end_year',
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'created_by' => $this->admin_id,
            'mentor_id' => $this->mentor_id,
            'city_id' => $this->city_id,
            'field_of_study_id' => $this->study_field_id,
            'university_name' => 'uni',
            'course_name' => 'course',
            'start_year' => '2012',
            'end_year' => '2020',
        ];
        $response = $this->actingAs($this->admin, 'admin')
            ->json('POST', '/api/admin/mentor-educations', $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $mentor_educations = MentorEducations::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/mentor-educations/' . $mentor_educations->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'mentor_id',
            'city_id',
            'field_of_study_id',
            'university_name',
            'course_name',
            'start_year',
            'end_year',
        ]]);
    }

    public function test_update_method()
    {
        $mentor_educations = MentorEducations::factory()->create();


        $data = [
            'mentor_id' => $this->mentor_id,
            'city_id' => $this->city_id,
            'field_of_study_id' => $this->study_field_id,
            'university_name' => 'uni',
            'course_name' => 'course',
            'start_year' => '2012',
            'end_year' => '2020',
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('PUT', '/api/admin/update-mentor-educations/' . $mentor_educations->id , $data);
        $response->assertStatus(200);
        $response->assertJson(['data' => $data]);
    }

    public function test_delete_method()
    {
        $mentor_educations = MentorEducations::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/mentor-educations/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->admin, 'admin')
            ->json('DELETE', '/api/admin/educations-records/'.$mentor_educations->id);
        $delete->assertStatus(200);
    }
}
