<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@localhost.test',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@localhost.test',
            'role' => 'user'
        ]);

        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@localhost.test',
            'role' => 'user'
        ]);
    }
}
