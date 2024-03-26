<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';

    protected $fillable = ['gname', 'leader_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class, 'leader_id', 'id');
    }
    public function isMember($userId)
    {
        return $this->members()->where('user_id', $userId)->exists();
    }
    public function members()
    {
        return $this->belongsToMany(User::class, 'group_members', 'group_id', 'user_id');
    }

}
