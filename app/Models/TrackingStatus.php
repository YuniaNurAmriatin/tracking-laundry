<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingStatus extends Model
{
    protected $fillable = ['nama_status','urutan'];

    public function logs()
    {
        return $this->hasMany(LaundryTrackingLog::class);
    }
}
