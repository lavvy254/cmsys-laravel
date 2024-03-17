<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'DOB',
        'roles',
        'gender',
        'phone',
        'email',
        'password',
    ];

    protected $dates = [
        'DOB',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * Set the first name attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setFnameAttribute($value)
    {
        $this->attributes['fname'] = ucfirst(strtolower($value));
    }

    /**
     * Set the last name attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setLnameAttribute($value)
    {
        $this->attributes['lname'] = ucfirst(strtolower($value));
    }
 

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'DOB' => 'date',
    ];
    public function prayerRequests()
    {
        return $this->hasMany(PrayerRequests::class);
    }
}
