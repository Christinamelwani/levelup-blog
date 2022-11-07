<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Reaction;
use App\Utils\StringUtils;

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
        $articlesQueryBuilder = Article::with('user', 'categories')
            ->orderBy('created_at', 'desc')
            ->category(request('category'))
            ->paginate(request('per_page'))
            ->appends(request()->all());

        return [
            "status" => 200,
            "articles" => $articlesQueryBuilder,
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = $request->validated();
        $article['user_id'] = auth()->user()->id;

        if (!$request->slug) {
            $article['slug'] = StringUtils::slugify($article['title']);
        }

        if ($request->image) {
            $path = $request->file('image')->store('public/images');
            if (!$path) {
                return response()->json(['msg' => 'image could not be saved'], 500);
            }
            $article['image_path'] = $path;
        }

        $new_article = new Article($article);
        $new_article->save();

        if ($request->categories) {
            $new_article->categories()->attach($request->categories);
        }

        return Response([
            "status" => 201,
            "article" => $new_article,
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
        $article->load(['user', 'categories', 'comments', 'comments.author']);
        $article->grouped_reactions =  $article->reactions->groupBy('reaction.type');
        $article->reaction_types = Reaction::All();
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
        $validatedArticle = $request->validated();

        if ($request->image) {
            $path = $request->file('image')->store('public/images');
            if (!$path) {
                return response()->json(['msg' => 'image could not be saved'], 500);
            }
            $validatedArticle['image_path'] = $path;
        }


        $article->update($validatedArticle);


        if ($request->categories) {
            $article->categories()->sync($request->categories);
        }

        if (empty($request->categories)) {
            $article->categories()->detach();
        }

        return [
            "status" => 200,
            "article" => $article,
        ];
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
        return [
            "status" => 200,
        ];
    }
}
