<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Label>
 */
class LabelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $labelName = $this->faker->unique()->randomElement(['Travel', 'Mockup', 'The Retro']);

        $slug = Str::slug($labelName, '-');


        return [
            'name' => $labelName,
            'slug' => $slug,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'image' => $this->faker->unique()->numberBetween(51, 53) . '.png',
            'description'=>$this->faker->text(1000),
        ];
    }
}
