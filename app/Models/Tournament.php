<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    public function tournamentImages()
    {
        return $this->hasMany(TournamentImage::class);
    }

    public function tournamentCategories()
    {
        return $this->hasMany(TournamentCategory::class);
    }
}
