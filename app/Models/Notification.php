<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notifications";
    protected $fillable = [
        'user_id',
        'tournament_id',
        'title',
        'description',
    ];
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }
}
