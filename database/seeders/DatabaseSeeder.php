<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClassificationSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\BookSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First, create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Add this line
        ]);

        // Then seed all other data in correct order
        $this->call([
            ClassificationSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            BookSeeder::class,
        ]);
    }
}
