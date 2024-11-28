<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SurveyQuestion;
use App\Models\SurveyAnswer;
use App\Models\Survey;
use App\Models\Department;
use App\Models\SchoolClass;
use App\Models\SurveySurveyQuestion;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\RoleFactory;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SurveyQuestion::factory() ->count(10) ->hasPosts(1) ->create();
		
		SurveyAnswer::factory() ->count(10) ->hasPosts(1) ->create();
		
		Survey::factory() ->count(10) ->hasPosts(1) ->create();
		
		Department::factory() ->count(10) ->hasPosts(1) ->create();
		
		SchoolClass::factory() ->count(10) ->hasPosts(1) ->create();
		
		SurveySurveyQuestion::factory() ->count(10) ->hasPosts(1) ->create();
		
		Questionnaire::factory() ->count(10) ->hasPosts(1) ->create();
		
		User::factory() ->count(10) ->hasPosts(1) ->create();
		
		RoleFactory::factory() ->count(10) ->hasPosts(1) ->create();
    }
}
