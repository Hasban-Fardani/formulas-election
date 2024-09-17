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
            'image' => 'tirizz.jpeg',
            'name' => 'Paslon Rois no. 1',
            'number' => 1,
            'vision' => 'Meneruskan yang sudah ada',
            'mission' => 'Mengadakan kumpul rutin seminggu sekali',
            'leader_id' => 4,
            // 'co_leader_id' => 5,
            'election_id' => 1
        ]);

        Candidate::create([
            'image' => 'tirizz.jpeg',
            'name' => 'Paslon Rois no. 2',
            'number' => 2,
            'vision' => 'Meneruskan yang sudah ada',
            'mission' => 'Mengadakan kumpul rutin seminggu sekali',
            'leader_id' => 6,
            // 'co_leader_id' => 7,
            'election_id' => 1
        ]);

        Candidate::create([
            'image' => 'tirizz.jpeg',
            'name' => 'Paslon Roisah no. 1',
            'number' => 1,
            'vision' => 'Meneruskan yang sudah ada',
            'mission' => 'Mengadakan kumpul rutin seminggu sekali',
            'leader_id' => 8,
            // 'co_leader_id' => 9,
            'election_id' => 2
        ]);

        Candidate::create([
            'image' => 'tirizz.jpeg',
            'name' => 'Paslon Roisah no. 2',
            'number' => 2,
            'vision' => 'Meneruskan yang sudah ada',
            'mission' => 'Mengadakan kumpul rutin seminggu sekali',
            'leader_id' => 8,
            // 'co_leader_id' => 9,
            'election_id' => 2
        ]);
    }
}
