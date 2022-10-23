<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleCategoryRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Clockwork\Request\Request;

class ArticleCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ArticleCategory::class, options: ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $article->load('categories');
        return Response([
            "status" => 200,
            "categories" =>  $article->categories,
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Article $article, Request $request) {
        $article_category = new ArticleCategory([
            'category_id' => $request->category_id,
            'article_id' => $article->id]);
        $article_category->save();
        return Response([
            "status" => 201,
            "category" =>  $article_category,
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ca  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, StoreArticleCategoryRequest $request)
    {
        $article_category = ArticleCategory::where('article_id', $article->id)->where('category_id', $request->category_id)->get();
        return Response([
            "status" => 200,
            "deleted" =>  $article_category,
        ], 200);
    }
}
