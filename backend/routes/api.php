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
use App\Models\ArticleReaction;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentReaction;
use App\Models\Reaction;
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

    Route::resource('users.articles', UserArticleController::class)->shallow()->except($unauthenticatedRoutes);
    Route::resource('users.comments', UserCommentController::class)->shallow()->except($unauthenticatedRoutes);
    Route::resource('articles.comments', ArticleCommentController::class)->shallow()->except($unauthenticatedRoutes);

    Route::post('/articles/{article}/categories', function (Article $article, StoreArticleCategoryRequest $request) {
        $article_category = new ArticleCategory([
            'category_id' => $request->category_id,
            'article_id' => $article->id]);
        $article_category->save();
        return  $article_category;
    });

    // Add a reaction to an article
    Route::post('/articles/{article}/reactions', function (Article $article, Request $request) {

        $user_id = auth()->user()->id;
        $article_id = $article->id;
        $reaction_id = $request->reaction_id;

        $article_reaction = ArticleReaction::where('user_id', '=', $user_id )
                    ->where('article_id', '=', $article_id)
                    ->where('reaction_id', '=', $reaction_id)
                    ->get();
        if(count($article_reaction) > 0){
            $reaction_type = Reaction::where('id','=', $reaction_id)->get()[0]->type;
            return "You cannot react '{$reaction_type}' to an article twice!";
        }
        $new_reaction = new ArticleReaction([
            'user_id' => $user_id,
            'article_id' => $article_id,
            'reaction_id' =>  $reaction_id,
        ]);
        $new_reaction->save();
        return  $new_reaction;
    });

        // Add a reaction to an article
        Route::post('/articles/{article}/reactions', function (Article $article, Request $request) {

            $user_id = auth()->user()->id;
            $article_id = $article->id;
            $reaction_id = $request->reaction_id;

            $article_reaction = ArticleReaction::where('user_id', '=', $user_id )
                        ->where('article_id', '=', $article_id)
                        ->where('reaction_id', '=', $reaction_id)
                        ->get();
            if(count($article_reaction) > 0){
                $reaction_type = Reaction::where('id','=', $reaction_id)->get()[0]->type;
                return "You cannot react '{$reaction_type}' to an article twice!";
            }
            $new_reaction = new ArticleReaction([
                'user_id' => $user_id,
                'article_id' => $article_id,
                'reaction_id' =>  $reaction_id,
            ]);
            $new_reaction->save();
            return  $new_reaction;
        });

    // Remove a reaction from an article
    Route::delete('/articles/{article}/reactions', function (Article $article, Request $request) {

        $user_id = auth()->user()->id;
        $article_id = $article->id;
        $reaction_id = $request->reaction_id;

        $article_reaction = ArticleReaction::where('user_id', '=', $user_id )
                    ->where('article_id', '=', $article_id)
                    ->where('reaction_id', '=', $reaction_id)
                    ->get();

        if(count($article_reaction) == 0){
            $reaction_type = Reaction::where('id','=', $reaction_id)->get()[0]->type;
            return "You have not reacted '{$reaction_type}' to this article yet!";
        }

        $article_reaction[0]->delete();

        return 'Deleted Successfully.';
    });


     // Add a reaction to a comment
     Route::post('/comments/{comment}/reactions', function (Comment $comment, Request $request) {

        $user_id = auth()->user()->id;
        $comment_id = $comment->id;
        $reaction_id = $request->reaction_id;

        $comment_reaction = CommentReaction::where('user_id', '=', $user_id )
                    ->where('comment_id', '=', $comment_id)
                    ->where('reaction_id', '=', $reaction_id)
                    ->get();
        if(count($comment_reaction) > 0){
            $reaction_type = Reaction::where('id','=', $reaction_id)->get()[0]->type;
            return "You cannot react '{$reaction_type}' to a comment twice!";
        }
        $new_reaction = new CommentReaction([
            'user_id' => $user_id,
            'comment_id' => $comment_id,
            'reaction_id' =>  $reaction_id,
        ]);
        $new_reaction->save();
        return  $new_reaction;
    });

    // Remove a reaction from a comment
    Route::delete('/comments/{comment}/reactions', function (Comment $comment, Request $request) {

        $user_id = auth()->user()->id;
        $comment_id = $comment->id;
        $reaction_id = $request->reaction_id;

        $comment_reaction = CommentReaction::where('user_id', '=', $user_id )
                    ->where('comment_id', '=', $comment_id)
                    ->where('reaction_id', '=', $reaction_id)
                    ->get();

        if(count($comment_reaction) == 0){
            $reaction_type = Reaction::where('id','=', $reaction_id)->get()[0]->type;
            return "You have not reacted '{$reaction_type}' to this comment yet!";
        }

        $comment_reaction[0]->delete();

        return 'Deleted Successfully.';
    });
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

Route::post('/login', function (Request $request) {
    return 'You must be logged in to access this route.';
});
