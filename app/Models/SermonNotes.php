<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SermonNotes extends Model
{
    use HasFactory;
    protected $table = 'sermon_note';
    protected $fillable=['sermon_id','notes'];

    public function sermon()
    {
        return $this->belongsTo(Sermon::class);
    }
}
