<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
