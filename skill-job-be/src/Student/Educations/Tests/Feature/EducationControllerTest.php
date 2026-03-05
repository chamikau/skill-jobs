<?php

namespace Student\Educations\Tests\Feature;

use App\Models\City;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Education;
use App\Models\FieldOfStudyType;
use App\Models\Student;
use App\Models\SuperAdmin;
use Tests\TestCase;

class EducationControllerTest extends TestCase
{
    protected $student;
    protected function setUp(): void
    {
        parent::setUp();
        $this->student = Student::factory()->create();
        $this->student_id = $this->student->id;
        $this->city = City::factory()->create();
        $this->city_id = $this->city->id;
        $this->study_field_type = FieldOfStudyType::factory()->create();
        $this->study_field_type_id = $this->study_field_type->id;

    }

    public function test_index_method()
    {
        $response = $this->actingAs($this->student, 'student')->json('GET', '/api/student/educations/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'student_id',
                    'city_id',
                    'field_of_study_id',
                    'university_name',
                    'course_name',
                    'grade',
                    'start_year',
                    'end_year',
                ]
            ]
        ]);
    }

    public function test_store_method()
    {
        $data = [
            'student_id' => $this->student_id ,
            'city_id' => $this->city_id,
            'field_of_study_id' => $this->study_field_type_id ,
            'university_name' => 'UoVT',
            'course_name' => 'software engineering',
            'grade' => 'grade 01',
            'start_year' => '2020-02-06',
            'end_year' => '2022-02-06',
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('POST', '/api/student/educations' , $data);
        $response->assertStatus(201);
    }

    public function test_show_method()
    {
        $education = Education::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/educations/' . $education->id);

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [
            'student_id',
            'city_id',
            'field_of_study_id',
            'university_name',
            'course_name',
            'grade',
            'start_year',
            'end_year'
        ]]);
    }

    public function test_update_method()
    {

        $education = Education::factory()->create();

        $data = [
            'city_id' => $this->city_id,
            'field_of_study_id' => $this->study_field_type_id ,
            'university_name' => 'UoVT',
            'course_name' => 'software engineering',
            'grade' => 'grade 01',
            'start_year' => '2020-02-06',
            'end_year' => '2022-02-06',
        ];

        $response = $this->actingAs($this->student, 'student')
            ->json('PUT', '/api/student/educations/' . $education->id , $data);
        $response->assertStatus(200);
    }

    public function test_delete_method()
    {
        $education = Education::factory()->create();

        $response = $this->actingAs($this->student, 'student')
            ->json('GET', '/api/student/educations/');
        $response->assertStatus(200);

        $delete = $this->actingAs($this->student, 'student')
            ->json('DELETE', '/api/student/educations-records/'.$education->id);
        $delete->assertStatus(200);
    }

}
