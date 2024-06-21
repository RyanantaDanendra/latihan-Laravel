<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\User;

class Orders extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timesStamps = false;
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product() {
        return $this->belongsTo(Products::class, 'id_product');
    }
}
