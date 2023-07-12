<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'user_id' => 2,
            'subtotal' => $this->faker->numberBetween(500, 3000),
            'name' => function (array $attributes) {
                $user = User::find($attributes['user_id']);
                return $user->name;
            },
            'email' => function (array $attributes) {
                $user = User::find($attributes['user_id']);
                return $user->email;
            },
            'telephone' => function (array $attributes) {
                $user = User::find($attributes['user_id']);
                return $user->telephone;
            },
            'status' => $this->faker->randomElement(['ordered', 'delivered', 'canceled']),
            'paymentmode' => $this->faker->randomElement(['cod', 'codcard', 'card']),
            'delivered_date' => $this->faker->optional()->date(),
            'canceled_date' => $this->faker->optional()->date(),
        ];
    }
}
