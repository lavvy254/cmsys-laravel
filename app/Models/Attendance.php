<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Reference\Reference;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    protected $fillable = ['event_id','user_id',];
    public function event()
    {
        return $this->belongsTo(Events::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
   