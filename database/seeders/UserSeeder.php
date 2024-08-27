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

        // candidate 1
        // leader
        User::factory()->create([
            'name' => 'Zaki',
            'email' => 'zaki@localhost.test',
            'role' => 'user',
        ]);
        // co leader
        User::factory()->create([
            'name' => 'Agam',
            'email' => 'agam@localhost.test',
            'role' => 'user',
        ]);

        // candidate 2
        // leader
        User::factory()->create([
            'name' => 'dava',
            'email' => 'dava@localhost.test',
            'role' => 'user',
        ]);
        // co leader
        User::factory()->create([
            'name' => 'gultom',
            'email' => 'gultom@localhost.test',
            'role' => 'user',
        ]);

        // candidate 3
        // leader
        User::factory()->create([
            'name' => 'pice',
            'email' => 'pice@localhost.test',
            'role' => 'user',
        ]);
        // co leader
        User::factory()->create([
            'name' => 'hasban',
            'email' => 'hasban@localhost.test',
            'role' => 'user',
        ]);
    }
}
