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
            'election_id' => 1
        ]);

        Candidate::create([
            'name' => 'Rois no. 2',
            'number' => 2,
            'image' => 'rois2.jpg',
            'vision' => 'Menjadikan IRMA Formulas komunitas sigma.',
            'mission' => 'Mengadakan mewing rutin setiap hari.',
            'election_id' => 1
        ]);

        Candidate::create([
            'name' => 'Roisah no. 1',
            'number' => 1,
            'image' => 'roisah1.jpg',
            'vision' => ':D',
            'mission' => ':D',
            'election_id' => 2
        ]);

        Candidate::create([
            'name' => 'Roisah no. 2',
            'number' => 2,
            'image' => 'roisah2.jpg',
            'vision' => ':3',
            'mission' => ':3',
            'election_id' => 2
        ]);
    }
}
