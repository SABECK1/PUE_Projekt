<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Survey;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SurveyAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $chosen_survey = $this->faker->numberBetween(1, 2);
        $questions_in_survey = DB::table('surveys')
            ->join('questionnaire_survey_question', 'surveys.questionnaire_id', '=', 'questionnaire_survey_question.questionnaire_id')
            ->where('surveys.id', '=', $chosen_survey)
            ->pluck('survey_question_id');
        return [
            'chosen_answer' => $this->faker->numberBetween(1, 5),
            'survey_id' => $chosen_survey,
            'survey_question_id' => $this->faker->randomElement($questions_in_survey),
        ];
    }
}
