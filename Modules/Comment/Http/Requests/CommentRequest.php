<?php

namespace Modules\Comment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Comment\Rules\ApprovedComment;
use Modules\Comment\Rules\CommentableRule;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() == true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => ['required'],
            'comment_id' => ['nullable' , new ApprovedComment()],
            'commentable_id' => ['required'],
            'commentable_type' => ['required' , new CommentableRule()]
        ];
    }
}
