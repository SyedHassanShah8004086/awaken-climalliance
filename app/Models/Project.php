<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'full_description',
        'image',
        'icon',
        'category',
        'status'
    ];
}