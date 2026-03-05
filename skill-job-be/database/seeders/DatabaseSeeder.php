<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\City;
use App\Models\Clinician;
use App\Models\Country;
use App\Models\IndustryType;
use App\Models\Location;
use App\Models\Organization;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Student::factory(10)->create();

//        Student::factory()->create([
//            'name' => 'Yohan Corera',
//            'email' => 'admin@primed.com',
//        ]);

//        Admin::factory()->create([
//            'first_name' => 'Yohan',
//            'last_name' => 'Corera',
//            'email' => 'admin@10qbit.com',
//        ]);

        \DB::table('countries')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'United Kingdom'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'India'
                )
        ));
        \DB::table('cities')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'London',
                    'country_id' => 1
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'York',
                    'country_id' => 1
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Derby',
                    'country_id' => 1
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Chennai',
                    'country_id' => 2
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Mumbai',
                    'country_id' => 2
                ),
            ));
        \DB::table('industry_types')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Management'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'IT'
                )
        ));
        \DB::table('job_types')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Software Engineer'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Ui/Ux'
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Quality Assurance'
                )
        ));
        \DB::table('hobbies')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Collecting Stamp',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Gaming'
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Riding'
                )
        ));
        \DB::table('skills')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Php',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Java'
                ),
        ));
        \DB::table('course_types')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Software Engineering',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Database Design'
                ),
        ));
        \DB::table('event_types')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Hackathon',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Seminar'
                ),
        ));

        \DB::table('work_experience_job_roles')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Intern Engineer'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Associate Engineer'
                )
        ));
        \DB::table('news_category_types')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'IT'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'HR'
                )
        ));
        \DB::table('field_of_study_types')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Bachelor of Software Technology'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Bachelor of MultiMedia Technology'
                )
        ));
        \DB::table('session_types')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Quick Call'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => '60mins meetings'
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Interview Preparation'
                )
        ));
//        IndustryType::factory(2)->create();

        foreach (Admin::all() as $admin) {
            Organization::factory(5)->create(['admin_id' => $admin->id]);
        }

        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

    }
}
