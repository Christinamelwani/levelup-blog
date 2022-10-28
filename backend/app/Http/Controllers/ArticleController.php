<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Utils\StringUtils;
use GuzzleHttp\Psr7\Response;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, options: ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articlesQueryBuilder = Article::with('user')->orderBy('created_at', 'asc')->paginate(8);
        $articlesQueryBuilder = Article::with('user')->newest()->category(request('category'))->paginate(8);

        return Response([
            "status" => 200,
            "articles" => $articlesQueryBuilder,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $validatedArticle = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'slug' => ['prohibited'],
            'user_id' => ['required'],
        ]);

        $validatedArticle['slug'] = StringUtils::slugify($validatedArticle['title']);

        $article = new Article($validatedArticle);

        $article->save();

        return Response([
            "status" => 201,
            "article" => $article,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->load(['user', 'categories', 'comments', 'comments.author', 'reactions']);
        return Response([
            "status" => 200,
            "article" => $article,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validatedArticle = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);

        $article->update($validatedArticle);
        return Response([
            "status" => 200,
            "article" => $article,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return Response([
            "status" => 200,
        ], 200);
    }
}
