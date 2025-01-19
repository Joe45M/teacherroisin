<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    public $casts = [
        'lesson_at' => 'datetime'
    ];

    public function student() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeUntaken($q)
    {
        return $q->whereDate('lesson_at', '>=', Carbon::now()->startOfDay());
    }

    public function blueprint()
    {
        return $this->belongsToMany(Blueprint::class);
    }
}
