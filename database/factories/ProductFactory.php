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
        $regular_price = $this->faker->numberBetween(100, 1000);
        $sale = $this->faker->boolean(70) * $this->faker->numberBetween(40, 70);
        $a = ['Назначение', 'Состав', 'Особенности модели', 'Уход за вещами', 'Тип посадки', 'Рисунок',];
        return [
            'name' => $productName,
            'slug' => $slug,
            'sort_description' => $this->faker->text(200),
            'description' => $this->faker->text(1000),
            'regular_price' => $regular_price,
            'sale' => $sale,
            'sale_price' => $sale != 0 ? $regular_price - $regular_price * ($sale / 100) : $regular_price,
            'SKU' => 'PRD' . $this->faker->unique()->numberBetween(100, 500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(10, 50),

            'appointment' => $this->faker->text(30),
            'composition' => $this->faker->text(30),
            'features' => $this->faker->text(30),
            'taking_care' => $this->faker->text(30),
            'landing' => $this->faker->text(30),
            'drawing' => $this->faker->text(30),

            'image' => $this->faker->numberBetween(1, 27) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 11),
            'featured' => $this->faker->boolean(70),

        ];
    }
}
