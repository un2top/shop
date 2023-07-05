<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=HomeSlider>
 */
class HomeSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $topTitle = $this->faker->unique()->randomElement(['Горячие акции', 'Выгодные предложения']);
        $title = $this->faker->unique()->randomElement(['Модные тренды', 'Специальные цены']);
        $subTitle = $this->faker->unique()->randomElement(['Новые коллекции', 'Топовые бренды']);
        $offer = $this->faker->unique()->randomElement(['Скидки на зимние вещи', 'Добавляйте нас в соц. сетях']);
        $img = $this->faker->unique()->randomElement(['1', '2']);
        return [
            'top_title' => $topTitle,
            'title' => $title,
            'sub_title' => $subTitle,
            'offer' => $offer,
            'link' => 'http://127.0.0.1:8000/shop',
            'status' => 1,
            'image' => $img . '.jpg',

        ];
    }
}
