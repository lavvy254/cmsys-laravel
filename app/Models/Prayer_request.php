<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayer_request extends Model
{
    protected $table = 'prayerrequest';

    protected $fillable =[
        'prayer_id',
        'user_id',
        'status',
    ];
    
}
