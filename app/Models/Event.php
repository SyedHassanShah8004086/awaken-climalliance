<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
protected $fillable = [
    'title',
    'slug',
    'description',
    'featured_image',  // Make sure this is here
    'location',
    'event_date',
    'event_end_date',
    'registration_link',
    'status'
];
    
    protected $casts = [
        'event_date' => 'datetime',
        'event_end_date' => 'datetime',
    ];
}