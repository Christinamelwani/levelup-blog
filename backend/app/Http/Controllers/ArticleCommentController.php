<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleCommentRequest;
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
        $comments = Comment::with('reactions')->where('article_id', $article->id)->paginate(5);
        return Response([
            "status" => 200,
            "comments" => $comments,
        ], 200);
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

        return Response([
            "status" => 201,
            "comment" => $comment,
        ], 201);
    }
}
