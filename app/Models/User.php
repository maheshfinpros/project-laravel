<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setEmailAttribute($email)
    {
        // Deconstruct
        $parts = explode('@', $email);

        // Find '+'
        $firstPart = $parts[0];
        $plusIndex = strpos($firstPart, '+');

        // Truncate '+' and everything after it in the username
        if ($plusIndex)
            $firstPart = substr($firstPart, 0, $plusIndex);

        // return (new) username@domain
        $this->attributes['email'] = $firstPart . '@' . (isset($parts[1]) ? $parts[1] : null);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
