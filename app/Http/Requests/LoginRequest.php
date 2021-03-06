<?php

namespace App\Http\Requests;

use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * Show JSON response to invalid data entered
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator->errors());
    }

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
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'email.max' => 'Email is too long',
            'email.required' => 'An email is required.',
            'email.email' => 'A valid email is required.',
            'password.required' => 'A password is required',
            'password.max' => 'Password is too long'
        ];
    }
}
