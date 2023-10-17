<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        //    \App\Models\Category::factory(20)->create();
        //     \App\Models\Product::factory(20)->create();
        //       \App\Models\Banner::factory(15)->create();
        //        \App\Models\Brand::factory(6)->create();
        //          \App\Models\Blog::factory(9)->create();
        //            \App\Models\Country::factory(100)->create();
        //              \App\Models\Attribute::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}