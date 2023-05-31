<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberOfTeam extends Model
{
    use HasFactory;
    protected $table = 'number_of_teams';
     protected $fillable = [
    'number_of_teams',
    'is_active'
];
}
