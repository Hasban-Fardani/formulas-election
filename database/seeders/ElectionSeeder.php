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
            'title' => 'Pemilihan ketua dan wakil ketua KOMIT 2024-2025',
            'start_time' => now(),
            'end_time' => now()->addDays(1),
        ]);
    }
}
