<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';

    protected $fillable =['gname','leader_id','description'];

    public function user()
    {
       return $this->belongsTo(User::class,'leader_id','id');
    }
}
