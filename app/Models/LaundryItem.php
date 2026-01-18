<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryItem extends Model
{
    protected $fillable = ['order_id','jenis_pakaian','jumlah'];

    public function order()
    {
        return $this->belongsTo(LaundryOrder::class, 'order_id');
    }
}
