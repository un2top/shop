<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\HomeSlider;
use App\Models\Label;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(11)->create();
        $label = Label::factory(3)->create();
        $products = Product::factory(100)->create();
        HomeSlider::factory(2)->create();
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('12345678'),
            'telephone'=> '+79780000000',
            'utype' => 'ADM',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@mail.ru',
            'password' => Hash::make('12345678'),
            'telephone'=> '+79780000111',
            'utype' => 'USR',
        ]);
        Comment::factory(1000)->create();
        Order::factory(10)->create();
        OrderItem::factory(30)->create();


        $products->each(function (Product $p) use ($label) {
            $selectedLabels = $label->random(rand(1, 3))->pluck('id')->toArray();
            foreach ($selectedLabels as $labelId) {
                $p->labels()->attach(
                    $labelId,
                    [
                        'quantity' => rand(10, 50),
                        'regular_price' => $regular_price = rand(100, 1000),
//                        'sale' => $sale = rand(0, 1) * rand(40, 70),
//                        'sale_price' => $regular_price - $regular_price * ($sale / 100),
                    ]
                );
            }
        });



    }
}
