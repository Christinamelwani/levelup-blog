<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// don't forget the dot!
Route::name('api.')->group(function () {
    // see documentation about what Route::resource does
    // https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller
    // could have used "Route::apiResource"
    // https://laravel.com/docs/9.x/controllers#restful-partial-resource-routes
    Route::resource('articles', ArticleController::class)->except([
        'create',
        'edit',
    ]);
});
