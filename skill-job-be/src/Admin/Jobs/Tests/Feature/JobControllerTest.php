<?php

namespace Admin\Jobs\Tests\Feature;

use App\Models\Admin;
use App\Models\City;
use App\Models\Job;
use App\Models\Organization;
use App\Models\SuperAdmin;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    protected $admin;
    protected $organization_id;
    protected function setUp(): void
    {
        parent::setUp();
        $this->organization = Organization::factory()->create();
        $this->organization_id = $this->organization->id;
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin->id;
        $this->city = City::factory()->create();
        $this->city_id = $this->city->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/jobs');

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
//        public function test_store_method()
//    {
//        $data = [
//                'created_by' => $this->admin_id ,
//                'organization_id'=>1,
//                'city_id'=>$this->city_id,
//                'title'=>'as',
//                'location_type'=>'online',
//                'number_of_openings'=>1,
//                'probation_duration'=>1,
//                'work_hours'=>1,
//                'work_hour_rate'=>1,
//                'application'=>'sdf',
//                'description'=>'sdf',
//                'state' => 'active'
//        ];
//
//        $response = $this->actingAs($this->admin, 'admin')
//            ->json('POST', '/api/admin/jobs?organization_id=' . 1 , $data);
//        $response->assertStatus(201);
//    }

    public function test_show_method()
    {
        $jobs = Job::factory()->create(['organization_id' => $this->organization_id]);

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/jobs/' . $jobs->id . '?organization_id=' . $this->organization_id);

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
