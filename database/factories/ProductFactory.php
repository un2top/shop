<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $productName = $this->faker->unique()->words(6, true);
        $slug = Str::slug($productName, '-');
        return [
            'name' => $productName,
            'slug' => $slug,
            'sort_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'SKU' => 'PRD' . $this->faker->unique()->numberBetween(100, 500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(10, 50),
            'image' => 'product-' . $this->faker->numberBetween(1, 16) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 5)

        ];
    }
}
