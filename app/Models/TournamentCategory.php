<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'category_id',
        'is_active',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
