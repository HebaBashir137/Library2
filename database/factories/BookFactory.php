<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get all existing type IDs
        $typeIds = Type::pluck('id')->toArray();
        $typeId = count($typeIds) > 0 ? $this->faker->randomElement($typeIds) : null;

        // Real book images from Unsplash
        $bookImages = [
            'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1541963463532-d68292c34b19?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1512820790803-83ca734da794?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1551029506-0807df4e2031?w=400&h=600&fit=crop',
            'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=400&h=600&fit=crop',
        ];

        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'type_id' => $typeId,
            'quantity' => $this->faker->numberBetween(5, 50),
            'price' => $this->faker->randomFloat(2, 9.99, 89.99),
            'imgurl' => $this->faker->randomElement($bookImages),
            'publisher' => $this->faker->company(),
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'updated_at' => now(),
        ];
    }
}