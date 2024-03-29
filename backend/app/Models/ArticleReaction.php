<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleReaction extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function reaction()
    {
        return $this->belongsTo(Reaction::class);
    }

    protected $fillable = ['user_id', 'article_id', 'reaction_id'];

    use HasFactory;
}
