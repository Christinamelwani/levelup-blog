<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        // this is a relationship towards User model, but we name it differently
        // therefore we must use explicitly state key
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    public function reactions()
    {
        return $this->hasMany(ArticleReaction::class);
    }

    public function scopeNewest($builder)
    {
        return $builder->orderBy('created_at', 'desc');
    }

    public function scopeCategory($builder, $category)
    {
        if (!$category) {
            return $builder;
        }

        return $builder->with('categories')->whereHas('categories', function ($q) use ($category) {
            $q->where('categories.id', $category);
        });
    }
}
