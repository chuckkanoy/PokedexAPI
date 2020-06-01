<?php

namespace App\Http\Requests;

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
        $error = [
            'error' => [
                'code' => 'VALIDATION_ERROR',
                'message' => 'You have validation errors in your submission',
                'validation_messages' => $validator->errors()
            ]
        ];
        throw new HttpResponseException(response()->json($error, 422));
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'An email is required.',
            'email.email' => 'A valid email is required.',
            'password.required' => 'A password is required'
        ];
    }
}
