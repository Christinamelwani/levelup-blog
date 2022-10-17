<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BaseCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Temporary way to bypass authorization
        $path_info = request()->pathInfo;
        $path = explode( "/", $path_info);
        if($path[2] == 'articles' || $path[2] == 'users'){
            return true;
        }

        if(auth()->user()->name === 'admin'){
            return true;
        }
        return request()->user_id == auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'article_id' => ['required', 'exists:users,id'],
            'content' => ['required', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
