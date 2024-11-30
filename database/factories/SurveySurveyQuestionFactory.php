<?php

namespace Database\Factories;
use App\Models\SurveyQuestion;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SurveySurveyQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'questionnaire_id' => $this->faker->numberBetween(1, 30),
            'survey_question_id' => SurveyQuestion::factory(),
        ];
    }
}
