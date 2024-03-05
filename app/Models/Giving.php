<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giving extends Model
{
    protected $table = 'giving';
    protected $fillable =[
        'user_id',
        'type',
        'transaction',
        'amount',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
