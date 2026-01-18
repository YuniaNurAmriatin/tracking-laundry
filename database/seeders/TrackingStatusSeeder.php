<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrackingStatus;

class TrackingStatusSeeder extends Seeder
{
    public function run(): void
    {
        TrackingStatus::insert([
            [
                'nama_status' => 'Diterima',
                'urutan' => 1
            ],
            [
                'nama_status' => 'Diproses',
                'urutan' => 2
            ],
            [
                'nama_status' => 'Selesai',
                'urutan' => 3
            ],
            [
                'nama_status' => 'Diambil',
                'urutan' => 4
            ],
        ]);
    }
}
