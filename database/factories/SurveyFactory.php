<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Questionnaire;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'surveycode' => $this->faker->unique()->bothify('SURV-####'),
            'school_class_id' => SchoolClass::factory(),
            'questionnaire_id' => Questionnaire::factory(),
            'finished' => $this->faker->boolean,
            'viewable' => $this->faker->boolean,
        ];
    }
}
