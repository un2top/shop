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
        $productName = $this->faker->unique()->text(30);
        $slug = Str::slug($productName, '-');
        if ($this->faker->boolean(70)) {
            $featured = 1;
        }
        return [
            'name' => $productName,
            'slug' => $slug,
            'sort_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'SKU' => 'PRD' . $this->faker->unique()->numberBetween(100, 500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(10, 50),
            'image' => $this->faker->numberBetween(1, 27) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 11),
            'featured'=>$this->faker->boolean(70),

        ];
    }
}
