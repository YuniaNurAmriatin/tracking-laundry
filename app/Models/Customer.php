<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'telp',
        'alamat',
    ];

    protected $primaryKey = 'id';

    public function orders()
    {
        return $this->hasMany(LaundryOrder::class, 'customer_id', 'id');
    }
}
