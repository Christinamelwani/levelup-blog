<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article_category = new ArticleCategory([
            'article_id' => '1',
            'category_id' => '1',
        ]);

        $article_category->save();

        $article_category = new ArticleCategory([
            'article_id' => '2',
            'category_id' => '2',
        ]);

        $article_category->save();
    }
}
