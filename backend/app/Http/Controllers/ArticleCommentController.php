<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleCommentRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Comment;

class ArticleCommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, options: ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        return Comment::with('reactions')->where('article_id', $article->id)->paginate(5);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleCommentRequest $request, Article $article)
    {
        $comment = new Comment($request->validated());
        $comment['article_id'] = $article->id;
        $comment['user_id'] = $request->user()->id;
        $comment->save();

        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $comment)
    {
       // We don't need this yet?
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        return $article->delete();
    }
}
