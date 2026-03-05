<?php

namespace Admin\Mentors\Tests\Feature;

use App\Models\Admin;
use App\Models\City;
use App\Models\Mentor;
use App\Models\Session;
use App\Models\SessionType;
use App\Models\SuperAdmin;
use Tests\TestCase;

class MentorSessionControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin->id;
        $this->mentor = Mentor::factory()->create();
        $this->mentor_id = $this->mentor->id;
        $this->session_type = SessionType::factory()->create();
        $this->session_type_id = $this->session_type->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/sessions/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'session_type_id',
                    'mentor_id',
                    'fees',
                    'available_time',
                    'description',
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'created_by' => $this->admin_id,
            'session_type_id' => $this->session_type_id,
            'mentor_id' => $this->mentor_id,
            'fees' => 2500,
            'available_time' => 1,
            'description' =>'description-test',

        ];
        $response = $this->actingAs($this->admin, 'admin')
            ->json('POST', '/api/admin/sessions', $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $mentor_sessions = Session::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/sessions/' . $mentor_sessions->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'session_type_id',
            'mentor_id',
            'fees',
            'available_time',
            'description',
        ]]);
    }

    public function test_update_method()
    {

        $mentor_sessions = Session::factory()->create();

        $data = [
            'created_by' => $this->admin_id,
            'session_type_id' => $this->session_type_id,
            'mentor_id' => $this->mentor_id,
            'fees' => 2500,
            'available_time' => 1,
            'description' =>'description-test',
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('PUT', '/api/admin/update-session/' . $mentor_sessions->id , $data);
        $response->assertStatus(200);
    }

    public function test_delete_method()
    {
        $mentor_sessions = Session::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/sessions/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->admin, 'admin')
            ->json('DELETE', '/api/admin/sessions-records/'.$mentor_sessions->id);
        $delete->assertStatus(200);
    }
}
