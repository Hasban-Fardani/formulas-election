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
            'title' => 'Pemilihan Rois IRMA Formulas KOMIT 2024-2025',
            'start_time' => now(),
            'end_time' => now()->addDays(1),
        ]);
        Election::create([
            'title' => 'Pemilihan Roisah IRMA Formulas KOMIT 2024-2025',
            'start_time' => now(),
            'end_time' => now()->addDays(1),
        ]);
    }
}
