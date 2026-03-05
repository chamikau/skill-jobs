<?php

namespace Admin\News\Tests\Feature;

use App\Models\Admin;
use App\Models\News;
use App\Models\Course;
use App\Models\SuperAdmin;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
        $this->admin_id = $this->admin;
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->admin, 'admin')->json('GET', '/api/admin/news/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'category_id' ,
                    'headline' ,
                    'content'
                ]
            ]
        ]);
    }

//    public function test_store_method()
//    {
//        $data = [
//                'category_id' ,
//                'headline' ,
//                'content'
//
//        ];
//        $response = $this->actingAs($this->admin, 'admin')
//            ->json('POST', '/api/admin/news', $data);
//        $response->assertStatus(201);
//        $response->assertJson(['data' => $data]);
//    }

    public function test_show_method()
    {
        $news = News::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/news/' . 1);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'category_id' ,
            'headline' ,
            'content'
        ]]);
    }

//    public function test_update_method()
//    {
//
//        $news = News::factory()->create();
//
//        $data = [
//            'category_id' => 1,
//            'headline' => 'News',
//            'content' => 'News des',
//        ];
//
//        $response = $this->actingAs($this->admin, 'admin')
//            ->json('PUT', '/api/admin/update-news/' . $news->id , $data);
//        $response->assertStatus(200);
//        $response->assertJson(['data' => $data]);
//    }

}
