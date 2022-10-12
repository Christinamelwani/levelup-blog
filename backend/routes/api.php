<?php

use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserArticleController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserController;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
});

Route::apiResource('articles', ArticleController::class)->only($unauthenticatedRoutes);
Route::apiResource('comments', CommentController::class)->only($unauthenticatedRoutes);

Route::apiResource('users', UserController::class);

Route::resource('users.articles', UserArticleController::class)->shallow();
Route::resource('users.comments', UserCommentController::class)->shallow();
Route::resource('articles.comments', ArticleCommentController::class)->shallow();

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
