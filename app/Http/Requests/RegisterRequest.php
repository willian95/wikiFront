<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            "name" => "required",
            "email" => "required|email|unique:users",
            "lastname" => "required",
            "institution_email" => "required|unique:users",
            "password" => "confirmed|min:8"
        ];
    }


    public function messages()
    {
        return [
            "institution_email.required" => "institution email is required",
            "institution_email.unique" => "institution email is already taken",
            "password" => "confirmed|min:8"
        ];
    }
}
