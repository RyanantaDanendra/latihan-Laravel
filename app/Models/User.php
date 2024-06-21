<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Products;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'Username',
        'email',
        'password',
        'image',
        'status',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function updateProfileImage($request) {
        $imagePath = $request->file('image')->store('image', 'public');
        $this->image = $imagePath;
        $this->save();   
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'id_user');
    }

    public function likes()
    {
        return $this->hasMany(like::class, 'id_user');
    }

    public function products() {
        return $this->hasMany(Products::class, 'id_user');
    }

    public function admin() {
        return $this->AS === 'admin';
    }
}
