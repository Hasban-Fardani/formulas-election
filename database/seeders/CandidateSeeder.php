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
            'name' => 'Rois no. 1',
            'number' => 1,
            'image' => 'rois1.png',
            'vision' => 'Menjadikan IRMA Formulas komunitas sigma',
            'mission' => 'Mengadakan looksmaxxing rutin seminggu sekali',
            'leader_id' => 2,
            // 'co_leader_id' => 5,
            'election_id' => 1
        ]);

        Candidate::create([
            'name' => 'Rois no. 2',
            'number' => 2,
            'image' => 'rois2.jpg',
            'vision' => 'Menjadikan IRMA Formulas komunitas sigma.',
            'mission' => 'Mengadakan mewing rutin setiap hari.',
            'leader_id' => 4,
            // 'co_leader_id' => 7,
            'election_id' => 1
        ]);

        Candidate::create([
            'name' => 'Roisah no. 1',
            'number' => 1,
            'image' => 'roisah1.jpg',
            'vision' => ':D',
            'mission' => ':D',
            'leader_id' => 6,
            // 'co_leader_id' => 9,
            'election_id' => 2
        ]);

        Candidate::create([
            'name' => 'Roisah no. 2',
            'number' => 2,
            'image' => 'roisah2.jpg',
            'vision' => ':3',
            'mission' => ':3',
            'leader_id' => 8,
            // 'co_leader_id' => 9,
            'election_id' => 2
        ]);
    }
}
