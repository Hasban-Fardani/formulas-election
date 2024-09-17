<?php

namespace Database\Seeders;

use App\Models\Election;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Election::create([
            'title' => 'Pemilihan Rois Angkatan 54',
            'image' => 'rois.png',
            'start_time' => now(),
            'end_time' => now()->addDays(1),
        ]);

        Election::create([
            'title' => 'Pemilihan Roisah Angkatan 54',
            'image' => 'roisah.png',
            'start_time' => now(),
            'end_time' => now()->addDays(1),
        ]);
    }
}
