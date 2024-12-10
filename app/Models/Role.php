<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE_STANDARD = '1';
    const ROLE_ADMIN = '2';
    public $timestamps = false;

}
