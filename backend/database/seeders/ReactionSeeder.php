<?php

namespace Database\Seeders;

use App\Models\Reaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reaction = new Reaction([
            'type' => 'Like',
            'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Facebook_like_thumb.png/1196px-Facebook_like_thumb.png',
        ]);
        $reaction->save();

        $reaction = new Reaction([
            'type' => 'Laugh',
            'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Emojione_1F602.svg/1200px-Emojione_1F602.svg.png',
        ]);

        $reaction->save();

        $reaction = new Reaction([
            'type' => 'Love',
            'img_url' => 'https://toppng.com/uploads/preview/heart-emoji-11549911583t6kulc2slx.png',
        ]);

        $reaction->save();

    }
}
