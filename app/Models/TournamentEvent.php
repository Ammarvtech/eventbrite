<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentEvent extends Model
{ 
    use HasFactory;
    protected $table = 'tournament_events';
    protected $fillable = [
    'name',
    'is_active'
];

}
