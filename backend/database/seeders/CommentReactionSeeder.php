<?php

namespace Database\Seeders;

use App\Models\CommentReaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment_reaction = new CommentReaction([
            'comment_id' => '1',
            'user_id' => '1',
            'reaction_id' => '1'
        ]);

        $comment_reaction->save();

        $comment_reaction = new CommentReaction([
            'comment_id' => '1',
            'user_id' => '2',
            'reaction_id' => '2'
        ]);

        $comment_reaction->save();

        $comment_reaction = new CommentReaction([
            'comment_id' => '1',
            'user_id' => '3',
            'reaction_id' => '3'
        ]);

        $comment_reaction->save();
    }
}
