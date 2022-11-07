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
}
