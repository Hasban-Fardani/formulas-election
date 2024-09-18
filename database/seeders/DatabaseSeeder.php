<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'nis' => 'admin',
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'role' => 'admin'
        ]);

        $this->call([
            // UserSeeder::class,
            ElectionSeeder::class,
            CandidateSeeder::class,
            VoteSeeder::class
        ]);
    }
}
