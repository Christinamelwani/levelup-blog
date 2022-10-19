<?php

namespace App\Http\Requests;

class StoreArticleCommentRequest extends BaseCommentRequest
{
    public function rules()
    {
        return [
            'content' => ['required', 'string'],
        ];
    }
}
