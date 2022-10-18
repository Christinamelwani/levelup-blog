<?php

namespace App\Http\Requests;

class StoreUserCommentRequest extends BaseCommentRequest
{

    public function rules()
    {
        return [
            'article_id' => ['required', 'exists:articles,id'],
            'content' => ['required', 'string'],
        ];
    }
}
