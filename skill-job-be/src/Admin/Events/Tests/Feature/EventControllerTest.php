<?php

namespace Admin\events\Tests\Feature;

use App\Models\Admin;
use App\Models\Event;
use App\Models\Course;
use App\Models\EventType;
use App\Models\SuperAdmin;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin;
        $this->event_type = EventType::factory()->create();
        $this->event_type_id = $this->event_type->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/events/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'event_type_id',
                    'name',
                    'event_organizer',
                    'date',
                    'location',
                    'description'
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
                'created_by'=>$this->admin_id,
                'event_type_id'=>$this->event_type_id,
                'name' => 'event',
                'event_organizer' => 'event organization',
                'date' => '2023-12-30',
                'location' => 'online',
                'description' => 'description list'

        ];
        $response = $this->actingAs($this->admin, 'admin')
            ->json('POST', '/api/admin/events', $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $event = Event::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/events/' . $event->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'event_type_id',
            'name',
            'event_organizer',
            'date',
            'location',
            'description'
        ]]);
    }

    public function test_update_method()
    {

        $event = Event::factory()->create();

        $data = [
            'event_type_id'=>$this->event_type_id,
            'name' => 'event',
            'event_organizer' => 'event organization',
            'date' => '2023-12-30',
            'location' => 'online',
            'description' => 'description list'
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('PUT', '/api/admin/events/' . $event->id , $data);
        $response->assertStatus(200);
        $response->assertJson(['data' => $data]);
    }

}
