<?php

namespace Database\Seeders;

use App\Models\ApplicationSurvey;
use App\Models\Role;
use App\Models\School;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::factory()->count(1)->create();

        User::factory()->create([
            'name' => 'Test User',
            'last_name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("1234"),
        ]);

        // Create school
        School::factory()->count(5)->create();

        // Create Survey
        Survey::factory()->count(1)->create()->each(function (Survey $survey) {

            $survey->questions()->saveMany(SurveyQuestion::factory()->count(10)->create([
                'survey_id' =>  $survey->id
            ]));
        });

        // Create Application survey
        ApplicationSurvey::factory()->count(1)->create();
    }
}
