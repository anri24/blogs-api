<?php

namespace Database\Seeders;

use App\Models\Blog;
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
        // User::factory(10)->create();

        Blog::factory(20)->create();

        User::factory()->create([
            'name' => 'anri',
            'email' => 'anri@gmail.com',
            'password' => Hash::make('anri1234')
        ]);
    }
}
