<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classi;

class ClassificationSeeder extends Seeder
{
    public function run(): void
    {
        $classifications = [
            ['name' => 'Fiction'],
            ['name' => 'Non-Fiction'],
            ['name' => 'Science'],
            ['name' => 'Technology'],
            ['name' => 'History'],
            ['name' => 'Biography'],
            ['name' => 'Children'],
            ['name' => 'Educational'],
        ];

        foreach ($classifications as $classification) {
            Classi::create($classification);
        }

        $this->command->info('✓ Classifications seeded successfully!');
    }
}