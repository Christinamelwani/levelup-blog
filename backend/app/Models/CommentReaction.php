<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReaction extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Article::class);
    }

    public function reaction()
    {
        return $this->belongsTo(Reaction::class);
    }

    protected $fillable = ['user_id', 'comment_id', 'reaction_id'];

    use HasFactory;
}
