<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=OrderItemFactory>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $order = Order::query()->inRandomOrder()->first();
        $productIds = Product::query()->inRandomOrder()->limit($this->faker->numberBetween(1, 5))->pluck('id')->toArray();

        return [
            'order_id' => $order->id,
            'product_id' => function () use ($productIds) {
                return Arr::random($productIds);
            },
            'quantity' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
