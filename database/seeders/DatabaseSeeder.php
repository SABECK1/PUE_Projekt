<?php

namespace Database\Seeders;

use App\Models\Questionnaire;
use App\Models\User;
use App\Models\Role;
use App\Models\SurveySurveyQuestion;
use App\Models\SurveyAnswer;
use App\Models\Survey;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\SurveyQuestionFactory;
use Database\Factories\SurveySurveyQuestionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::factory()->create();
        User::factory(30)->create();
        Questionnaire::factory(30)->create();
        SurveySurveyQuestion::factory(30)->create();
        SurveyAnswer::factory(500)->create();
    }
}
