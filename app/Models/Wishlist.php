<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $fillable = [
        'user_id',
        'tournament_id',
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
