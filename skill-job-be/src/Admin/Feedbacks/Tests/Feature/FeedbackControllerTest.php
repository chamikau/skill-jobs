<?php

namespace Admin\Feedbacks\Tests\Feature;

use App\Models\Admin;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\SuperAdmin;
use Tests\TestCase;

class FeedbackControllerTest extends TestCase
{
    protected $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = SuperAdmin::factory()->create();
    }

    public function test_index_method()
    {
        $feedback = Feedback::factory(2)->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->get('/api/admin/feedbacks');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            '*' => ['number_of_rating', 'message']
        ]]);
    }

    public function test_show_method()
    {
        $feedback = Feedback::factory()->create();

        $response = $this->actingAs($this->admin, 'admin')
            ->json('GET', '/api/admin/feedbacks/' . $feedback->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'number_of_rating', 'message'
        ]]);
    }
}
