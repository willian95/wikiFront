<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "login_email" => "required|email",
            "login_password" => "required"
        ];
    }

    public function messages()
    {
        return [
            "login_email.required" => "Email is required",
            "login_email.email" => "Email is not valid",
            "login_password.required" => "Password is required"
        ];
    }
}
