<?php

namespace Admin\Mentors\Tests\Feature;

use App\Models\Mentor;
use App\Models\SuperAdmin;
use Tests\TestCase;

class MentorControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/mentors/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'position',
                    'phone_number_1',
                    'about_mentor',
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'created_by' => $this->admin_id,
            'name' => 'mentor',
            'position'  => 'pos',
            'phone_number_1' => '01132456789',
            'about_mentor' => 'adf',

        ];
        $response = $this->actingAs($this->admin, 'admin')
            ->json('POST', '/api/admin/mentors', $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $mentor = Mentor::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/mentors/' . $mentor->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'name',
            'position',
            'phone_number_1',
            'about_mentor',
        ]]);
    }

    public function test_update_method()
    {

        $mentor = Mentor::factory()->create();

        $data = [
            'name' => 'mentor',
            'position'  => 'pos',
            'phone_number_1' => '01132456789',
            'about_mentor' => 'adf',
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('PUT', '/api/admin/update-mentors/' . $mentor->id , $data);
        $response->assertStatus(200);
        $response->assertJson(['data' => $data]);
    }

}
