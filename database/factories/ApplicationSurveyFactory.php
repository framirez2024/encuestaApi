<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicationSurvey>
 */
class ApplicationSurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $school = School::all()->pluck('id');
        $survey = Survey::all()->pluck('id');
        $date = Carbon::now()->addDays(random_int(1, 3));

        return [
            'school_id'     =>  $this->faker->randomElement($school),
            'survey_id'     =>  $this->faker->randomElement($survey),
            'date'          =>  $date
        ];
    }
}
