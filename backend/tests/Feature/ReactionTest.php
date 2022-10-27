<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReactionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_react_to_another_users_article()
    {
        $user = User::factory(1)->create()[0];
        $reaction = Reaction::factory(1)->createOne();
        $article = Article::factory(1)->createOne();

        $response = $this->actingAs($user)
            ->post(
                "/api/articles/{$article->slug}/reactions",
                [
                    'reaction_id' => $reaction->id,
                ],
            );
        $response->assertStatus(201);

        $article = Article::all()[0];
        $createdReaction = $article->articleReactions[0];
        $this->assertEquals($reaction->type, $createdReaction->reaction->type);
        $this->assertEquals($user->id, $createdReaction->user->id);
    }

    public function test_user_can_react_to_another_users_comment()
    {
        $user = User::factory(1)->create()[0];
        $reaction = Reaction::factory(1)->createOne();
        $comment = Comment::factory(1)->createOne();

        $response = $this->actingAs($user)
            ->post(
                "/api/comments/{$comment->id}/reactions",
                [
                    'reaction_id' => $reaction->id,
                ],
            );
        $response->assertStatus(201);

        $comment = Comment::all()[0];
        $createdReaction = $comment->commentReactions[0];
        $this->assertEquals($reaction->type, $createdReaction->reaction->type);
        $this->assertEquals($user->id, $createdReaction->user->id);
    }
}
