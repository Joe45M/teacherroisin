<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'english_name',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function assessment()
    {
        return $this->hasOne(Assessment::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function referralTrackers()
    {
        return $this->hasMany(ReferralTracker::class, 'referred_by_id', 'id');
    }

    public function getBalanceAttribute()
    {
        return $this->tokens()->where('type', 'in')->sum('token') - $this->tokens()->where('type', 'out')->sum('token');
    }
}
