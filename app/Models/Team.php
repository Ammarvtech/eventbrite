<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
