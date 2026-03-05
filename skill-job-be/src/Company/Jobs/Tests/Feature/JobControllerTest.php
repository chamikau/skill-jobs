<?php

namespace Company\Jobs\Tests\Feature;

use App\Models\Admin;
use App\Models\City;
use App\Models\Job;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    protected $admin;
    protected $organization_id;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::factory()->create();
        $this->admin_id = $this->admin->id;
        $this->city = City::factory()->create();
        $this->city_id = $this->city->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'company')
            ->json('GET', '/api/company/jobs');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'organization_id',
                    'city_id',
                    'title',
                    'location_type',
                    'number_of_openings',
                    'probation_duration',
                    'work_hours',
                    'work_hour_rate',
                    'application',
                    'description',
                    'state'
                ]
            ]
        ]);
    }
        public function test_store_method()
    {
        $data = [
                'created_by'=>$this->admin_id,
                'organization_id'=>1,
                'city_id'=>$this->city_id,
                'title'=>'as',
                'location_type'=>'online',
                'number_of_openings'=>1,
                'probation_duration'=>1,
                'work_hours'=>1,
                'work_hour_rate'=>1,
                'application'=>'sdf',
                'description'=>'sdf',
        ];

        $response = $this->actingAs($this->admin, 'company')
            ->json('POST', '/api/company/jobs?organization_id=' . $this->organization_id , $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $jobs = Job::factory()->create(['organization_id' => $this->organization_id]);

        $response = $this->actingAs($this->admin, 'company')
            ->json('GET', '/api/company/jobs/' . $jobs->id . '?organization_id=' . $this->organization_id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'organization_id',
            'city_id',
            'title',
            'location_type',
            'number_of_openings',
            'probation_duration',
            'work_hours',
            'work_hour_rate',
            'application',
            'description',
        ]]);
    }
}
