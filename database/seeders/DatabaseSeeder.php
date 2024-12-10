<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::factory()->count(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'last_name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("1234"),
        ]);
    }
}
