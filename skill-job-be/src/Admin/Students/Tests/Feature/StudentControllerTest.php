<?php

namespace Admin\Students\Tests\Feature;

use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/students');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            '*' => ['first_name',
                    'last_name',
                    'phone_number_1',
                    'phone_number_2',
                    'email',
                    'password',
                    'linkedin_link',
                    'facebook_link',
                    'instagram_link',
                    'github_link']
        ]]);
    }

    public function test_show_method()
    {
        $student = Student::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/students/' . $student->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'first_name',
            'last_name',
            'phone_number_1',
            'phone_number_2',
            'email',
            'password',
            'linkedin_link',
            'facebook_link',
            'instagram_link',
            'github_link'
        ]]);
    }
}
