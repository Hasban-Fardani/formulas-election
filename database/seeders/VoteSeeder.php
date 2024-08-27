<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vote::create([
            'user_id' => 2,
            'candidate_id' => 1,
            'election_id' => 1
        ]);
    }
}
