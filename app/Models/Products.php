<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Orders;
use Cviebrock\EloquentSluggable\Sluggable;

class Products extends Model
{
    use Sluggable;

    public function Sluggable():array {
        return [
                'slug' => [
                    'source' => 'name'
                ]
            ];
    }

    protected $guarded = [
        'id',
    ];
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function likes() {
        return $this->hasMany(like::class, 'id_product');
    }

    public function order() {
        return $this->hasMany(Orders::class, 'id_product');
    }
}
