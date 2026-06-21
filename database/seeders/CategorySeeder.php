<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Classi;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // First ensure classifications exist
        if (Classi::count() === 0) {
            $this->call(ClassificationSeeder::class);
        }

        $categories = [
            // Fiction categories
            ['name' => 'Novels', 'classi_id' => 1],
            ['name' => 'Mystery', 'classi_id' => 1],
            ['name' => 'Romance', 'classi_id' => 1],
            ['name' => 'Science Fiction', 'classi_id' => 1],
            ['name' => 'Fantasy', 'classi_id' => 1],
            
            // Non-Fiction categories
            ['name' => 'Self-Help', 'classi_id' => 2],
            ['name' => 'Business', 'classi_id' => 2],
            ['name' => 'Cookbooks', 'classi_id' => 2],
            
            // Science categories
            ['name' => 'Physics', 'classi_id' => 3],
            ['name' => 'Biology', 'classi_id' => 3],
            ['name' => 'Chemistry', 'classi_id' => 3],
            
            // Technology categories
            ['name' => 'Programming', 'classi_id' => 4],
            ['name' => 'Web Development', 'classi_id' => 4],
            ['name' => 'Data Science', 'classi_id' => 4],
            
            // History categories
            ['name' => 'Ancient History', 'classi_id' => 5],
            ['name' => 'World War', 'classi_id' => 5],
            ['name' => 'Cultural History', 'classi_id' => 5],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->command->info('✓ Categories seeded successfully!');
    }
}