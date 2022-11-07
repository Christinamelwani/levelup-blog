<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\StoreUserArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Utils\StringUtils;

class UserArticleController extends Controller
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
    public function index(User $user)
    {
        $articlesQueryBuilder = Article::with('author')
            ->orderBy('created_at', 'desc')
            ->where('user_id', $user->id)
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
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserArticleRequest $request, User $user)
    {
        $validatedArticle = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'slug' => ['prohibited'],
        ]);

        $validatedArticle['slug'] = StringUtils::slugify($validatedArticle['title']);

        $validatedArticle['user_id'] = $user->id;

        $article = new Article($validatedArticle);

        return Response([
            "status" => 201,
            "article" => $article,
        ], 201);
    }
}
