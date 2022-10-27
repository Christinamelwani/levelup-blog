<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'id';
    }

    protected $fillable = ['article_id', 'category_id'];

}
