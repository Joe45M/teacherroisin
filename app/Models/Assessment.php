<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $casts = [
        'assessment' => 'array',
    ];
}
