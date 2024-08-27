<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidate::create([
            'name' => 'Paslon no. 1',
            'vision' => 'Membangun komunitas it',
            'mission' => 'Mengadakan kumpul rutin seminggu sekali',
            'leader_id' => 3,
            'co_leader_id' => 4,
            'election_id' => 1
        ]);

        Candidate::create([
            'name' => 'Paslon no. 2',
            'vision' => 'Membangun komunitas it',
            'mission' => 'Mengadakan kumpul rutin seminggu sekali',
            'leader_id' => 5,
            'co_leader_id' => 6,
            'election_id' => 1
        ]);

        Candidate::create([
            'name' => 'Paslon no. 3',
            'vision' => 'Membangun komunitas it',
            'mission' => 'Mengadakan kumpul rutin seminggu sekali',
            'leader_id' => 7,
            'co_leader_id' => 8,
            'election_id' => 1
        ]);
    }
}
