<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    use HasFactory;
    protected $table = 'sermon';
    protected $fillable =['title','speaker','event_id'];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }
}
