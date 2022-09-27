<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
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

// user must be authenticated to access this
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// don't forget the dot!
Route::name('api.')->group(function () {
    // see documentation about what Route::resource does
    // https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
    // could use "apiResource" as well
    // https://laravel.com/docs/9.x/controllers#restful-partial-resource-routes
    Route::resource('articles', ArticleController::class)->except([
        'create',
        'edit',
    ]);


    Route::get('/users/{user:slug}', function (User $user) {
        return $user;
    })->name('users.show');

    Route::post('/users', function (StoreUserRequest $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'slug' => 'required',
            'password' => 'forbidden'
        ]);

        // we will learn how to properly handle passwords later in the course:)
        $validated['password'] = Hash::make('never store passwords in plaintext');

        $user = new User($validated);
        $user->save();

        return $user;
    })->name('users.store');

    Route::get('/{author:slug}/articles', function (User $author) {
        if (!auth()->user()) {
            return 'not user';
        }

        if (!request()->user()?->is($author)) {
            return 'not user';
        }

        return $author->articles;
    })->name('author.articles');

    Route::apiResource('comments', CommentController::class);

    Route::post('/token', function (Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8)]
        ]);

        $user = User::where('email', $validated['email'])->firstOrFail();

        return $user->createToken('auth_token')->plainTextToken;
    });

    Route::get('/success', fn () => 'done');

    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/api/success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    });
});
