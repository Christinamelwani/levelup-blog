<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_create_article()
    {
        $user = User::factory(1)->create()[0];

        $response = $this->actingAs($user)
            ->post(
                '/api/articles',
                [
                    'title' => 'test title',
                    'content' => 'my testing content',
                    'user_id' => $user->id
                ],
            );

        $response->assertStatus(201);

        $articles = Article::all();
        $this->assertCount(1, $articles);
        $article = $articles[0];

        $this->assertEquals('test title', $article->title);
        $this->assertEquals('test-title', $article->slug);
        $this->assertEquals('my testing content', $article->content);
    }

    public function test_user_can_edit_article()
    {
        $user = User::factory(1)->create()[0];
        $response = $this->actingAs($user)
            ->post(
                '/api/articles',
                [
                    'title' => 'test title',
                    'content' => 'my testing content',
                    'user_id' => $user->id
                ],
            );

        $articles = Article::all();
        $article = $articles[0];


        $response = $this->actingAs($user)
        ->put(
            "/api/articles/{$article->slug}",
            [
                'title' => 'new title',
                'content' => 'new testing content',
                'user_id' => $user->id
            ],
        );

        $response->assertStatus(200);
        $articles = Article::all();
        $article = $articles[0];

        $this->assertEquals('new title', $article->title);
        $this->assertEquals('test-title', $article->slug);
        $this->assertEquals('new testing content', $article->content);
    }

    public function test_anyone_can_view_articles()
    {
        $response = $this->getJson(
                '/api/articles'
        );
        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['status', 'articles'])
        );
    }

    public function test_anyone_can_view_any_article()
    {
        $article = Article::factory(1)->create()[0];
        $response = $this->getJson(
            "/api/articles/{$article->slug}"
        );
        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['status', 'article'])
        );
    }

    public function test_user_cannot_delete_another_users_article()
    {
        $user = User::factory(1)->create()[0];
        $article = Article::factory(1)->createOne();

        $response = $this->actingAs($user)
            ->delete(
                "/api/articles/{$article->slug}",
            );

        $response->assertStatus(403);
    }

    public function test_unauthenticated_user_cannot_create_article()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
            ])->post(
                '/api/articles',
                [
                    'title' => 'test title',
                    'content' => 'my testing content',
                    'user_id' => 1
                ],
            );

        $response->assertStatus(401);
    }
}
