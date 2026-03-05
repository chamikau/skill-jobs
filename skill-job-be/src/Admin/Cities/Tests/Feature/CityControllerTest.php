<?php

namespace Admin\Cities\Tests\Feature;

use App\Models\SuperAdmin;
use Tests\TestCase;

class CityControllerTest extends TestCase
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
            ->json('GET', '/api/admin/cities');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['country_id', 'name']
        ]]);
    }

}
