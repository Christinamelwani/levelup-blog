<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model

{
    use HasFactory;
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    protected $fillable = ['title', 'content', 'user_id', 'article_id'];


    public function getRouteKeyName()
    {
        return 'id';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
