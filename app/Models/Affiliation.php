<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    use HasFactory;
    protected $table = 'affiliations';
    protected $fillable = [
    'name',
    'is_active',
    'created_at',
    'updated_at',
];
}
