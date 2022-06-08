<?php

namespace Modules\RolePermissions\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolePermissionRequest extends FormRequest
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
            "name" => "required|min:3|unique:roles,name",
            "permissions" => "required|array|min:1"
        ];

        if (request()->method === 'PATCH') {
            $rules["id"] = "required|exists:roles,id";
            $rules["name"] = "required|min:3|unique:roles,name," . request()->id;
            $rules["permissions"] = "nullable|array|min:1";
        }

        return $rules;
    }
}
