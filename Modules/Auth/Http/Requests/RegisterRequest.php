<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Share\Rules\ValidPassword;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'min:3', 'unique:users,email'],
            'phone' => ['numeric' , 'digits:11' , 'nullable', 'unique:users,phone'],
            'passwords' => ['required', 'string', 'min:6', new ValidPassword()],
            'privacy' => ['required'],
        ];
    }
}
