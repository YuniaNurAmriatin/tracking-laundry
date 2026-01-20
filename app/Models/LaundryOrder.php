<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryOrder extends Model
{
    protected $table = 'laundry_orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'customer_id',
        'user_id',
        'laundry_id',
        'berat',
        'tracking_code',
        'tanggal_masuk',
        'estimasi_selesai',
        'total_harga',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function logs()
    {
        return $this->hasMany(LaundryTrackingLog::class, 'order_id', 'id');
    }

    public function trackingHistories()
    {
        return $this->hasMany(
            LaundryTrackingHistory::class,
            'laundry_order_id',
            'id'
        );
    }

    public function items()
    {
        return $this->hasMany(LaundryItem::class, 'order_id', 'id');
    }

    public function laundry()
    {
        return $this->belongsTo(Laundry::class, 'laundry_id', 'id');
    }
}
