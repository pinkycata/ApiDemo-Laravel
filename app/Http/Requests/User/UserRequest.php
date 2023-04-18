<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', "string"],
            "login" => ['required', "string", "unique:users"],
            "email" => ['required', "email", "unique:users"],
            "role_id" => ['required', "integer"],
            "password" => ['required', "string", "min:6"],
            "image" => ["image"],
        ];
    }
}
