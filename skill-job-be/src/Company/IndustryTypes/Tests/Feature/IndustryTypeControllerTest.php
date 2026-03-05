<?php

namespace Company\IndustryTypes\Tests\Feature;

use App\Models\Admin;
use App\Models\Job;
use Tests\TestCase;

class IndustryTypeControllerTest extends TestCase
{
    protected $admin;
    protected $organization_id;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::factory()->create();
        $this->created_by = $this->admin->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'company')
            ->json('GET', '/api/company/industry-types');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name'
                ]
            ]
        ]);
    }

}
