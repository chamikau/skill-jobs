<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppointmentsListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_appointments()
    {
        $response = $this->get('/');

        $response = $this->actingAs(Admin::findOrFail(1),'admin')
            ->get('/api/admin/organizations');

        $response = $this->postJson('/api/admin/organizations', ['name' => 'Sally']);
//        $this->assertTrue($response['created']);
        $response->assertStatus(201)->assertJsonPath('data.name', 'Sally');
    }
}
