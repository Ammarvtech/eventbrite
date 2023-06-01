<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'full_name',
        'email',
        'tournament_title',
        'country_id',
        'state',
        'city',
        'zip_code',
        'address',
        'phone',
        'description',
        'is_active',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function intrests()
    {
        return $this->hasMany(Intrest::class);
    }
}
