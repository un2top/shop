<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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
        Product::factory(16)->create();
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@mail.ru',
             'password'=>Hash::make('12345678'),
             'utype'=>'ADM',
         ]);
    }
}
