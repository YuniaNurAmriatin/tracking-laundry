<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryTrackingHistory extends Model
{
    public $timestamps = false; 

    protected $fillable = [
        'laundry_order_id',
        'tracking_status_id',
        'keterangan'
    ];

    public function status()
{
    return $this->belongsTo(
        TrackingStatus::class,
        'tracking_status_id',
        'id'
    );
}

public function order()
{
    return $this->belongsTo(
        LaundryOrder::class,
        'laundry_order_id',
        'id'
    );
}
    
}
