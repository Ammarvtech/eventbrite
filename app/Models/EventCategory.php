<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;
    protected $table = 'event_categories';
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
