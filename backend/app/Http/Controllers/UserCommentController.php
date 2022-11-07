<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StoreUserCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\User;

class UserCommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, options: ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return [
            "status" => 200,
            "comments" => Comment::with('author')->where('user_id', $user->id)->paginate(5),
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserCommentRequest $request, User $user)
    {
        $comment = new Comment($request->validated());
        $comment['user_id'] = $user->id;
        $comment->save();

        return Response([
            "status" => 201,
            "comment" => $comment,
        ], 201);
    }
}
