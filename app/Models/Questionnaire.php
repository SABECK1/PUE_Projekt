<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Questionnaire extends Model
{
    use HasFactory;
    public function questions(): belongsToMany {
        return $this->belongsToMany(SurveyQuestion::class);
    }
}
