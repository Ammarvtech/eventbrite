<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    // define fillable fields
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'type',
        'start_date',
        'end_date',
        'registration_dead_line',
        'event_type',
        'country_id',
        'city',
        'postal_code',
        'address',
        'latitude',
        'longitude',
        'number_of_teams',
        'format',
        'prize_distribution',
        'level',
        'entry_fee',
        'rules',
        'code_of_conduct',
        'age',
        'equipment_requirements',
        'schedule_date',
        'schedule_time',
        'schedule_breaks',
        'venue_availability',
        'second_match_date',
        'second_match_time',
        'second_match_breaks',
        'second_venue_availability',
        'third_match_date',
        'third_match_time',
        'third_match_breaks',
        'third_venue_availability',
        'fourth_match_date',
        'fourth_match_time',
        'fourth_match_breaks',
        'fourth_venue_availability',
        'contact_information',
        'roles_and_responsibilities',
        'sponsor_information',
        'overview',
    ];

    public function images()
    {
        return $this->hasMany(TournamentImage::class);
    }

    public function tournamentCategories()
    {
        return $this->hasMany(TournamentCategory::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function type(){
        return $this->belongsTo(TournamentType::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function teams(){
        return $this->hasMany(Team::class);
    }
    public function teamMembers(){
        return $this->hasManyThrough(TeamMember::class, Team::class);
    }
}
