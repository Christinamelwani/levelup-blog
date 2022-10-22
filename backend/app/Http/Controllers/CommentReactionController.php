<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentReactionRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\CommentReaction;
use App\Models\Reaction;
use Clockwork\Request\Request;

class CommentReactionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CommentReaction::class, options: ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $comment)
    {
        $comment->load('comment_reactions');
        return $comment->comment_reactions;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Comment $comment, StoreCommentReactionRequest $request) {

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
        return Response([
            "status" => 201,
            "reaction" => $new_reaction,
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ca  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy (Comment $comment, Request $request) {

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

        return Response([
            "status" => 200,
        ], 200);
    }
}
