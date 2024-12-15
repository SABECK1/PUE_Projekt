<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsToMany(SurveyQuestion::class);
    }

    public function survey()
    {
        return $this->belongsToMany(Survey::class);
    }
}
