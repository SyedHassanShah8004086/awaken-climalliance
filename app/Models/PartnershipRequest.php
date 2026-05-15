<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipRequest extends Model
{
    protected $table = 'partnership_requests';
    
    protected $fillable = [
        'organization', 'contact_person', 'email', 'phone', 'message', 'status'
    ];
}