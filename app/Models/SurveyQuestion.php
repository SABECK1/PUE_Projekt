<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class SurveyQuestion extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }

    public function questionnaire(): belongsToMany {
        return $this->belongsToMany(Questionnaire::class);
    }

}
