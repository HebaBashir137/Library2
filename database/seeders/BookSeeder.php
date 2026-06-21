<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Type;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // First ensure types exist
        if (Type::count() === 0) {
            $this->call(TypeSeeder::class);
        }

        // Create 20 books using factory
        Book::factory()->count(20)->create();

        $this->command->info('✓ 20 Books seeded successfully with real images!');
    }
}