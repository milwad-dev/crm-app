<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Share\Rules\ValidPassword;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:250'],
            'email' => ['required', 'email', 'min:3', 'max:250', 'unique:users,email'],
            'phone' => ['nullable','numeric' , 'digits:11' , 'unique:users,phone'],
            'password' => ['required', 'string', 'min:6', new ValidPassword()],
        ];

        if (request()->method === 'PATCH') {
            $rules['email'] = ['required', 'email', 'min:3', 'max:250', 'unique:users,email,' . request()->id];
            $rules['phone'] = ['nullable','numeric' , 'digits:11' , 'unique:users,phone,' . request()->id];
            $rules['password'] = ['nullable', 'string', 'min:6', new ValidPassword()];
        }

        return $rules;
    }
}
