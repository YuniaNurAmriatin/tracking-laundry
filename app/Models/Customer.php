<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'telp',
        'alamat',
    ];

    public function orders()
    {
        return $this->hasMany(LaundryOrder::class);
    }
}