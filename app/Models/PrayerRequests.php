<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayerRequests extends Model
{
    use HasFactory;
    protected $table = 'prayer_requests';
    protected $fillable =['prayer_id', 'status', 'requested_by'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prayer()
    {
        return $this->belongsTo(Prayer::class);
    }
}
