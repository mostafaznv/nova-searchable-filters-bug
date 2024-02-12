<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(15)->create();
        User::factory(1)->withEmail('admin@nova.com')->create();

        Category::factory(8)->create();
        Article::factory(50)->create();
    }
}
