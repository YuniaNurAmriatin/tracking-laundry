<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $fillable = [
        'nama_laundry',
        'alamat',
        'no_hp',
        'deskripsi'
    ];

    public function orders()
    {
        return $this->hasMany(LaundryOrder::class);
    }
}