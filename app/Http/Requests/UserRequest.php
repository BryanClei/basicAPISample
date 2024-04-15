<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                Rule::unique("users", "username")->ignore($this->user)
            ],
            'password' => 'required'
        ];
    }

    // public function messages(){
    //     return [
    //         'username' => 'Test',
    //     ];
    // }

    // public function attributes()
    // {
    //     return [
    //         'username' => 'pangalan'
    //     ];
    // }
}
