<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Category;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        // First ensure categories exist
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class);
        }

        $types = [
            // Fiction types
            ['name' => 'Hardcover', 'category_id' => 1, 'edition' => 'First Edition'],
            ['name' => 'Paperback', 'category_id' => 1, 'edition' => 'Standard Edition'],
            ['name' => 'Collector', 'category_id' => 1, 'edition' => 'Special Edition'],
            
            // Mystery types
            ['name' => 'Paperback', 'category_id' => 2, 'edition' => 'Mystery Edition'],
            ['name' => 'E-Book', 'category_id' => 2, 'edition' => 'Digital Edition'],
            
            // Romance types
            ['name' => 'Paperback', 'category_id' => 3, 'edition' => 'Romance Edition'],
            ['name' => 'Audiobook', 'category_id' => 3, 'edition' => 'Audio Edition'],
            
            // Programming types
            ['name' => 'Hardcover', 'category_id' => 13, 'edition' => 'Technical Edition'],
            ['name' => 'E-Book', 'category_id' => 13, 'edition' => 'PDF Edition'],
            ['name' => 'Paperback', 'category_id' => 13, 'edition' => 'Student Edition'],
            
            // Science types
            ['name' => 'Hardcover', 'category_id' => 9, 'edition' => 'Academic Edition'],
            ['name' => 'Paperback', 'category_id' => 9, 'edition' => 'Study Edition'],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }

        $this->command->info('✓ Types seeded successfully!');
    }
}