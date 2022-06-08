<?php

namespace Modules\Auth\Http\Requests;

use Modules\Auth\Services\VerifyCodeService;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordVerifyCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'verify_code' => VerifyCodeService::getRule(),
            'email' => 'required|email'
        ];
    }
}
