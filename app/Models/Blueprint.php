<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blueprint extends Model
{
    public function lesson()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
