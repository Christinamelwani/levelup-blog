<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_create_comment()
    {
        $user = User::factory(1)->create()[0];
        $article = Article::factory(1)->createOne();

        $response = $this->actingAs($user)
            ->post(
                '/api/comments',
                [
                    'content' => 'my testing content',
                    'article_id' => $article->id,
                    'user_id' => $user->id
                ],
            );
        $response->assertStatus(201);

        $comments = Comment::all();
        $this->assertCount(1, $comments);
        $comment = $comments[0];

        $this->assertEquals('my testing content', $comment->content);

        // Check if comment is properly attached to article
        $article_comments = Article::all()[0]->comments;
        $comment = $article_comments[0];

        $this->assertEquals('my testing content', $comment->content);


        // Check if comment is properly attached to user
        $user_comments = User::all()[0]->comments;
        $comment = $user_comments[0];

        $this->assertEquals('my testing content', $comment->content);
    }

    public function test_user_can_edit_comment()
    {
        $article = Article::factory(1)->createOne();
        $user = User::factory(1)->create()[0];

        $response = $this->actingAs($user)
            ->post(
                '/api/comments',
                [
                    'title' => 'test title',
                    'content' => 'my testing content',
                    'user_id' => $user->id,
                    'article_id' => $article->id
                ],
            );

        $comments = Comment::all();
        $comment = $comments[0];

        $response = $this->actingAs($user)
        ->put(
            "/api/comments/{$comment->id}",
            [
                'content' => 'new testing content',
                'user_id' => $user->id,
                'article_id' => $article->id
            ],
        );

        $response->assertStatus(200);
        $comments = Comment::all();
        $comment = $comments[0];

        $this->assertEquals('new testing content', $comment->content);
    }

    public function test_anyone_can_view_comments()
    {
        $response = $this->getJson(
                '/api/comments'
        );
        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['status', 'comments'])
        );
    }

    public function test_anyone_can_view_any_article()
    {
        $comment = Comment::factory(1)->create()[0];
        $response = $this->getJson(
            "/api/comments/{$comment->id}"
        );
        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['status', 'comment'])
        );
    }

    public function test_user_cannot_delete_another_users_comment()
    {
        $user = User::factory(1)->create()[0];
        $comment = Comment::factory(1)->createOne();

        $response = $this->actingAs($user)
            ->delete(
                "/api/comments/{$comment->id}",
            );

        $response->assertStatus(403);
    }
}
