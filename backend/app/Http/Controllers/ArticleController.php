<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Utils\StringUtils;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // N+1 problem
        $articles = Article::all()->load(['user', 'comments', 'comments.author']);

        if (!request()->routeIs('api.*')) {
            return view('index', ['articles' => $articles]);
        }

        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-article');
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
        try {
            $article->save();
        } catch (\Exception $e) {
            if (!request()->routeIs('api.*')) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['msg' => $e->getMessage()]);
            }

            throw $e;
        }

        if (!request()->routeIs('api.*')) {
            return redirect(route('articles.show', ['article' => $article]));
        }

        return $article;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        if (!request()->routeIs('api.*')) {
            return view('article', ['article' => $article]);
        }

        return $article;
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
            'content' => ['required'],
        ]);

        $article->update($validatedArticle);
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
    }
}
