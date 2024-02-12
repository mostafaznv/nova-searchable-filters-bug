<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $user = User::query()->select('id')->inRandomOrder()->first();
        $category = Category::query()->select('id')->inRandomOrder()->first();

        return [
            'user_id'     => $user->id,
            'category_id' => $category->id,
            'title'       => fake()->realText(40),
            'content'     => fake()->realText(700),
        ];
    }
}
