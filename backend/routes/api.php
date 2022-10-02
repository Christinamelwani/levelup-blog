<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/users/{author:slug}/articles', function (User $author) {
        if (!request()->user()?->is($author)) {
            return 'not user';
        }

        return $author->articles;
    })->name('author.articles');

    Route::apiResource('comments', CommentController::class)->except(['index']);

    Route::resource('articles', ArticleController::class)->except([
        'create',
        'edit',
    ]);
});

Route::post('/users', function (StoreUserRequest $request) {
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'slug' => 'required',
        'password' => 'required'
    ]);

    $validated['password'] = Hash::make($validated['password']);

    $user = new User($validated);
    $user->save();

    return $user;
})->name('users.store');

Route::get('/users/{user:slug}', function (User $user) {
    return $user;
})->name('users.show');

Route::get('/comments', [CommentController::class, 'index']);

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
