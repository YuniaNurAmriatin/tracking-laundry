<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryTrackingLog extends Model
{
    protected $fillable = [
        'order_id',
        'tracking_status_id',
        'catatan',
        'waktu_update'
    ];

    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo(TrackingStatus::class, 'tracking_status_id');
    }

    public function order()
    {
        return $this->belongsTo(LaundryOrder::class, 'order_id');
    }
}
