<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'nis' => '123123123',
            'password' => Hash::make('Str0ngPw@ssw0rd!'),
        ]);

        $this->call([
            // UserSeeder::class,
            ElectionSeeder::class,
            CandidateSeeder::class,
            VoteSeeder::class
        ]);
    }
}
