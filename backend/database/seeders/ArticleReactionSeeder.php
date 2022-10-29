<?php

namespace Database\Seeders;

use App\Models\ArticleReaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article_reaction = new ArticleReaction([
            'article_id' => '1',
            'user_id' => '1',
            'reaction_id' => '1'
        ]);

        $article_reaction->save();

        $article_reaction = new ArticleReaction([
            'article_id' => '1',
            'user_id' => '2',
            'reaction_id' => '2'
        ]);

        $article_reaction->save();

        $article_reaction = new ArticleReaction([
            'article_id' => '1',
            'user_id' => '3',
            'reaction_id' => '3'
        ]);

        $article_reaction->save();
    }
}
