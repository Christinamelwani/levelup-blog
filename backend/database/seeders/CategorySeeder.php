<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category([
            'name' => 'Fashion',
        ]);
        $category->save();

        Category::factory(5)->create();

        $articleCategory = new ArticleCategory([
            'category_id' => 1,
            "article_id" => 1
        ]);
        $articleCategory->save();

        $articleCategory = new ArticleCategory([
            'category_id' => 1,
            "article_id" => 4
        ]);
        $articleCategory->save();

        $articleCategory = new ArticleCategory([
            'category_id' => 6,
            "article_id" => 1
        ]);
        $articleCategory->save();

    }
}
