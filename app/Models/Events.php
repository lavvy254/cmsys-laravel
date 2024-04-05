<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = ['ename', 'location', 'description' ,'start_date','end_date'];

    protected $dates=['start_date','end_date'];    
}
