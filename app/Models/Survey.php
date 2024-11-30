<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function school_class() {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }
}
