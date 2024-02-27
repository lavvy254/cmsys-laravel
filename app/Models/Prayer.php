<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    protected $table = 'prayer';

    protected $fillable =[
        'title',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prayer()
    {
        return $this->belongsTo(Prayer::class);
    }
}
