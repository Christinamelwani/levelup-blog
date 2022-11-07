<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReactionRequest;
use App\Http\Requests\UpdateReactionRequest;
use App\Models\Reaction;

class ReactionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Reaction::class, options: ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            "status" => 200,
            "reactions" => Reaction::all(),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactionRequest $request)
    {
        $reaction = new Reaction([
            'type' => $request->type,
            'img_url' => $request->img_url
        ]);
        $reaction->save();
        return Response([
            "status" => 201,
            "reaction" => $reaction,
        ], 201);
    }
}
