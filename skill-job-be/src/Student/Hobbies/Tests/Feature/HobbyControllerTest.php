<?php

namespace Student\Hobbies\Tests\Feature;

use App\Models\Hobby;
use App\Models\Student;
use Tests\TestCase;

class HobbyControllerTest extends TestCase
{
    protected $student;
    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/hobbies');

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            ['name']
        ]]);
    }

    public function test_show_method()
    {
        $hobby = Hobby::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/student-hobbies/'.$hobby->id);
        $response->assertJson([]);
    }

//    public function test_store_method()
//    {
//        $user = Student::factory()->create();
//        $this->actingAs($user);
////        $this->assertDatabaseHas('student_goals', [
////            'student_id' => $user->id,
////        ]);
//        $this->assertDatabaseHas('student_hobbies', [
//            'student_id' => 2,
//            'hobby_id' => 1,
//        ]);
////        $this->assertDatabaseHas('skill_user', [
////            'student_id' => 1,
////            'skill_id' => 4,
////        ]);
//        $response = $this->post('/api/student/hobbies');
//
//        $response->assertStatus(200);
//    }


}
