<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleReactionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReactionController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserArticleController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserController;
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

    Route::post('/users/{user}/article', [UserArticleController::class, 'store']);
    Route::post('/users/{user}/comment', [UserCommentController::class, 'store']);
    Route::post('/articles/{article}/comment', [ArticleCommentController::class, 'store']);

    Route::post('/articles/{article}/reactions', [ArticleReactionController::class, 'store']);
    Route::delete('/articles/{article}/reactions/{reaction}', [ArticleReactionController::class, 'destroy']);

    Route::post('/comments/{comment}/reactions', [CommentReactionController::class, 'store']);
    Route::delete('/comments/{comment}/reactions/{reaction}', [CommentReactionController::class, 'destroy']);
});


Route::apiResource('articles', ArticleController::class)->only($unauthenticatedRoutes);
Route::apiResource('comments', CommentController::class)->only($unauthenticatedRoutes);
Route::apiResource('categories', CategoryController::class)->only($unauthenticatedRoutes);
Route::apiResource('reactions', ReactionController::class)->only($unauthenticatedRoutes);
Route::apiResource('users', UserController::class);

Route::get('/users/{user}/articles', [UserArticleController::class, 'index']);
Route::get('/users/{user}/comments', [UserCommentController::class, 'index']);
Route::get('/articles/{article}/comment', [ArticleCommentController::class, 'index']);

Route::get('/articles/{article}/reactions', [ArticleReactionController::class, 'index']);
Route::get('/comments/{comment}/reactions', [CommentReactionController::class, 'index']);

Route::post('/authenticate', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', Password::min(8)]
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['status' => 401, 'message' => 'invalid credentials'], 401);
    }

    $user = User::where('email', $credentials['email'])->firstOrFail();

    return Response([
        "status" => 200,
        "token" => $user->createToken('auth_token')->plainTextToken,
    ], 200);
});
