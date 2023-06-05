<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intrest extends Model
{
    use HasFactory;
    protected $table = 'Intrests';
    protected $fillable = [
        'full_name',
        'booking_id',
        'is_active'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
