<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'image',
        'caption',
        'is_primary',
        'is_active',
        'is_deleted',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
