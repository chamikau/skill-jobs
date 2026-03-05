<?php

namespace Admin\Hobbies\Tests\Feature;

use App\Models\Admin;
use App\Models\Hobby;
use App\Models\SuperAdmin;
use Tests\TestCase;

class StudentHobbyControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_show_method()
    {
        $hobby = Hobby::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/student-hobbies/'.$hobby->id);
        $response->assertJson([]);
    }

}
