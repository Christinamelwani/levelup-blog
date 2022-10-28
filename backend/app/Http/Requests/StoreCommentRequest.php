<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends BaseCommentRequest
{
    public function authorize()
    {
        request()->user_id = auth()->user()->id;

        return true;
    }
}
