<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'available_seats',
        'acceptance',
        'organiser_id',
        'category_id',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'organiser_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }
}

