<?php

namespace Admin\FieldOfStudyType\Tests\Feature;

use App\Models\Admin;
use App\Models\FieldOfStudyType;
use App\Models\SuperAdmin;
use Tests\TestCase;

class FieldOfStudyTypeControllerTest extends TestCase
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
            ->json('GET', '/api/admin/field-of-study-types');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }
}
