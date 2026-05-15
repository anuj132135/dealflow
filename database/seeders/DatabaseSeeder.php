<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Lead::factory()->count(20)->create();
<<<<<<< HEAD
        User::factory()->count(5)->create();
=======
        // User::factory()->count(20)->create();
>>>>>>> 705ae20f799cf140dfc8c234184a72792a6f8107
    }

    
}
