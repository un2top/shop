<?php

namespace Database\Factories;

use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=LabelProduct>
 */
class LabelProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $regular_price = $this->faker->numberBetween(100, 1000);
        $sale = $this->faker->boolean(70) * $this->faker->numberBetween(40, 70);



        return [
            'label_id' => $this->faker->numberBetween(1,3),
            'product_id' => $this->faker->unique(true)->numberBetween(1,100),
            'quantity' => $this->faker->numberBetween(10,30),
            'regular_price' => $regular_price,
            'sale' => $sale,
            'sale_price' => $sale != 0 ? $regular_price - $regular_price * ($sale / 100) : $regular_price,
            'sales' => $this->faker->numberBetween(0,20),

        ];
    }
}
