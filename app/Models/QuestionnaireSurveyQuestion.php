<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class QuestionnaireSurveyQuestion extends Model
{
    use HasFactory;
    //Sonst nimmt er immer den Plural-Namen (?)
    protected $table = 'questionnaire_survey_question';
    public $timestamps = false;
}
