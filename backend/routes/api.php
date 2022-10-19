<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserArticleController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserController;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$unauthenticatedRoutes = ['index', 'show'];

Route::middleware('auth:sanctum')->group(function () use ($unauthenticatedRoutes) {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('articles', ArticleController::class)->except($unauthenticatedRoutes);
    Route::apiResource('comments', CommentController::class)->except($unauthenticatedRoutes);
    Route::apiResource('categories', CategoryController::class)->except($unauthenticatedRoutes);
    Route::apiResource('reactions', ReactionController::class)->except($unauthenticatedRoutes);

    Route::resource('users.articles', UserArticleController::class)->shallow()->except($unauthenticatedRoutes);;
    Route::resource('users.comments', UserCommentController::class)->shallow()->except($unauthenticatedRoutes);;
    Route::resource('articles.comments', ArticleCommentController::class)->shallow()->except($unauthenticatedRoutes);;
});

Route::apiResource('articles', ArticleController::class)->only($unauthenticatedRoutes);
Route::apiResource('comments', CommentController::class)->only($unauthenticatedRoutes);
Route::apiResource('categories', CategoryController::class)->only($unauthenticatedRoutes);
Route::apiResource('reactions', ReactionController::class)->only($unauthenticatedRoutes);

Route::apiResource('users', UserController::class);

Route::resource('users.articles', UserArticleController::class)->shallow()->only($unauthenticatedRoutes);;
Route::resource('users.comments', UserCommentController::class)->shallow()->only($unauthenticatedRoutes);;
Route::resource('articles.comments', ArticleCommentController::class)->shallow()->only($unauthenticatedRoutes);;

Route::post('/authenticate', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', Password::min(8)]
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['code' => 403, 'message' => 'invalid credentials'], 403);
    }

    $user = User::where('email', $credentials['email'])->firstOrFail();

    return $user->createToken('auth_token')->plainTextToken;
});

// Add a category to an article
Route::post('/articles/{article}/categories', function (Article $article, StoreArticleCategoryRequest $request) {
    $article_category = new ArticleCategory([
        'category_id' => $request->category_id,
        'article_id' => $article->id]);
    return  $article_category;
})->middleware('auth:sanctum');
