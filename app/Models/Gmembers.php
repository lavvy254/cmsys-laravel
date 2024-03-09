<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gmembers extends Model
{
    protected $table = 'group_members';

    protected $fillable =[
        'leader_id',
        'group_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function groups()
    {
        return $this->belongsTo(Groups::class,'group_id', 'id');
    }
}
