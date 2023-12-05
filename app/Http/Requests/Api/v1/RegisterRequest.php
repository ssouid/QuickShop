<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'       => 'required|string|min:4|max:50',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|confirmed|min:8',
            'mobile'     => 'required|numeric',
            'address'    => 'required|string|min:3',
            'gander'     => 'required|string|in:male,female',
            'status'     => 'required|string|in:panding,active',
        ];
    }
}
