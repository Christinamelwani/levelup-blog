<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create a user with known credentials and 3 posts
        // https://laravel.com/docs/9.x/seeding#using-model-factories
        User::factory(1)
            ->set('name', 'Test User')
            ->set('slug', 'test-user')
            ->set('email', 'test@example.com')
            ->set('password', Hash::make('password'))
            ->hasArticles(3) // special magic method
            ->create();

        User::factory(1)
            ->set('name', 'other User')
            ->set('slug', 'other-user')
            ->set('email', 'other@example.com')
            ->set('password', Hash::make('password'))
            ->hasArticles(3) // special magic method
            ->create();

        // create two more users without posts
        (new UserFactory(2))
            ->set('name', 'user without posts')
            ->create();

        // seeder is a place in which to create the objects
        $this->call([
            ArticleSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
