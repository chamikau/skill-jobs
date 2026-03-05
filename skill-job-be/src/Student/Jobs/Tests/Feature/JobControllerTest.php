<?php

namespace Student\Jobs\Tests\Feature;

use App\Models\Student;
use App\Models\Job;
use Student\Jobs\States\Job\Active;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    protected $student;
    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
        $this->student_id = $this->student->id;
        $this->job = Job::factory()->create();
        $this->job_id = $this->job->id;
    }

    public function test_index_method()
    {
        Job::factory()->create(['state' =>  Active::$name]);
        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/jobs?state=' . Active::$name);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
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
                ],
            ]
        ]);
    }
        public function test_store_method()
    {
        $data = [
                'student_id' => $this->student_id ,
                'job_id'=> $this->job_id,
        ];
        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/jobs' , $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $job = Job::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/jobs/' . $job->id);

        $response->assertStatus(200);

        $response->assertJsonStructure();
        $response->assertJsonMissing(['userIdMatch']);
    }


}
