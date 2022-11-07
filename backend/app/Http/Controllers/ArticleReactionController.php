<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleReactionRequest;
use App\Models\Article;
use App\Models\ArticleReaction;
use App\Models\Reaction;

class ArticleReactionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, options: ['except' => ['index', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $article->load('article_reactions');
        return [
            "status" => 200,
            "article" => $article->article_reactions,
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article, StoreArticleReactionRequest $request)
    {
        $user_id = auth()->user()->id;
        $article_id = $article->id;
        $reaction_id = $request->reaction_id;

        $article_reaction =  $article->reactions->where('user_id', $user_id)->where('reaction_id', $reaction_id);
        if (count($article_reaction) > 0) {
            $reaction_type = Reaction::where('id', '=', $reaction_id)->get()[0]->type;
            return Response(['status' => 400, 'msg' => "You have already reacted {$reaction_type} to this article!"], 400);
        }
        $new_reaction = new ArticleReaction([
            'user_id' => $user_id,
            'article_id' => $article_id,
            'reaction_id' =>  $reaction_id,
        ]);
        $new_reaction->save();
        return Response([
            "status" => 201,
            "reaction" => $new_reaction,
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ca  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Reaction $reaction)
    {
        $user_id = auth()->user()->id;
        $reaction_id = $reaction->id;

        $article_reaction =  $article->reactions->where('user_id', $user_id)->where('reaction_id', $reaction_id);
        if (count($article_reaction) == 0) {
            $reaction_type = Reaction::where('id', '=', $reaction_id)->get()[0]->type;
            return Response(['status' => 400, 'msg' => "You have not reacted {$reaction_type} to this article yet!"], 400);
        }

        $article_reaction->firstOrFail()->delete();

        return [
            "status" => 200,
        ];
    }
}
