<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Utils\StringUtils;

class UserArticleController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Article::class, options: ['except' => ['index', 'show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return Article::with('author')->where('user_id', $user->id)->paginate(5);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request, User $user)
    {
        $validatedArticle = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'slug' => ['prohibited'],
        ]);

        $validatedArticle['slug'] = StringUtils::slugify($validatedArticle['title']);

        $validatedArticle['user_id'] = $user;

        $article = new Article($validatedArticle);

        return $article;
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
