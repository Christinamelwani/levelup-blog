<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\User;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)
            ->set('name', 'Test User')
            ->set('slug', 'test-user')
            ->set('email', 'test@example.com')
            ->create();

        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
