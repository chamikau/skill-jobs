<?php

namespace Admin\Courses\Tests\Feature;

use App\Models\Content;
use App\Models\Course;
use App\Models\SuperAdmin;
use Tests\TestCase;

class ContentControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin;
        $this->course = Course::factory()->create();
        $this->course_id = $this->course->id;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/contents/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'course_id',
                    'content_name',
                    'number_of_lectures',
                    'lecture_hours',
                    'content_description'
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'created_by' => $this->admin_id,
            'course_id' => $this->course_id,
            'content_name' => "chamika",
            'number_of_lectures' => 1,
            'lecture_hours' => 1,
            'content_description' => 'test',

        ];
        $response = $this->actingAs($this->admin, 'admin')
            ->json('POST', '/api/admin/contents', $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $content = Content::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/contents/' . 1);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'course_id',
            'content_name',
            'number_of_lectures',
            'lecture_hours',
            'content_description'
        ]]);
    }

    public function test_update_method()
    {

        $content = Content::factory()->create();

        $data = [
            'course_id' => $this->course_id,
            'content_name' => "chamika",
            'number_of_lectures' => 1,
            'lecture_hours' => 1,
            'content_description' => 'test',
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->json('PUT', '/api/admin/contents/' . $content->id , $data);
        $response->assertStatus(200);
        $response->assertJson(['data' => $data]);
    }

    public function test_delete_method()
    {
        $content = Content::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/contents/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->admin, 'admin')
            ->json('DELETE', '/api/admin/contents-records/'.$content->id);
        $delete->assertStatus(200);
    }

}
