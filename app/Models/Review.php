<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'tournament_id',
        'user_id',
        'rating',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
