<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SurveyQuestion>
 */
class SurveyQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['text', 'options'];
        $type = $this->faker->randomElement($types);
        $options = $this->fillArray();

        return [
            'name'          => $this->faker->sentence(random_int(1, 3)),
            'type'          => $type,
            'is_required'   => true,
            'options'       => $type == 'options' ? $options : []
        ];
    }

    private function fillArray()
    {
        $maxOptions = random_int(2, 5);
        $options = array();

        for ($i = 1; $i < $maxOptions; $i++) {
            array_push($options, "opcion {$i}");
        }

        return $options;
    }
}
