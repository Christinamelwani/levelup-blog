<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
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
            ->orderBy(request('ordering'), request('direction'))
            ->category(request('category'))
            ->paginate(request('per_page'))
            ->appends(request()->all());

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
            'slug' => ['nullable'],
            'image' => ['nullable', 'image'],
        ]);


        $validatedArticle['user_id'] = auth()->user()->id;

        if (!$request->slug) {
            $validatedArticle['slug'] = StringUtils::slugify($validatedArticle['title']);
        }

        if ($request->image) {
            $path = $request->file('image')->store('public/images');
            if (!$path) {
                return response()->json(['msg' => 'image could not be saved'], 500);
            }
            $validatedArticle['image_path'] = $path;
        }

        $article = new Article($validatedArticle);

        $article->save();

        if ($request->categories) {
            $article->categories()->attach($request->categories);
        }
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
            'title' => ['nullable'],
            'content' => ['nullable'],
            'slug' => ['nullable'],
            'user_id' => ['nullable'],
            'image' => ['nullable', 'image'],
        ]);

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
