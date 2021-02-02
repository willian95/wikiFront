<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterInstitutionRequest extends FormRequest
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
            "admin_institution_name" => "required",
            "admin_institution_lastname" => "required",
            "admin_institution_email" => "required|unique:users,institution_email",
            "admin_institution_phone" => "required",
            "admin_institution_password" => "required|confirmed|min:8"
        ];
    }

    public function messages(){
        
        return [
            "admin_institution_name.required" => "Admin institution name is required",
            "admin_institution_lastname.required" => "Admin institution lastname is required",
            "admin_institution_email.required" => "Admin institution email is required",
            "admin_institution_email.unique" => "Admin institution email is already taken",
            "admin_institution_phone.required" => "Admin institution phone is required",
            "admin_institution_password.required" => "Admin institution password is required",
            "admin_institution_password.confirmed" => "Admin institution passwords dosen't match",
            "admin_institution_password.confirmed" => "Admin institution passwords must be at least 8 characters",
        ];

    }
}
