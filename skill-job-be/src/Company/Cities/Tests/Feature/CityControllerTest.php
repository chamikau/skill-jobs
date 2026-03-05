<?php

namespace Company\Cities\Tests\Feature;

use App\Models\Admin;
use App\Models\Job;
use Tests\TestCase;

class CityControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::factory()->create();
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'company')
            ->json('GET', '/api/company/cities');

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
