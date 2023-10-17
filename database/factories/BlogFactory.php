<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = $this->faker->unique()->words($no=2, $astext=true);
        $slug = Str::slug($title);
        return [
            
            "category_id" => $this->faker->numberBetween(21,40),
            "title" => $title,
            "slug" => $slug,
            "image" => "blog-".$this->faker->numberBetween(1,9).".jpg",
            "description" => $this->faker->text(200),
        ];
    }
}