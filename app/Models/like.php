<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_user',
    ];

    public function product() {
        return $this->belongsTo(Products::class, 'id_product');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
