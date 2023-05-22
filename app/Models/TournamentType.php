<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentType extends Model
{ 
    use HasFactory;
    protected $table = 'tournament_types';

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }
}
