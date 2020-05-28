<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Show JSON response to invalid data entered
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            //assure that user does not already have an account
            'email' => 'required|email|unique:users,email,{$this->user->id}',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'An email is required.',
            'email.email' => 'A valid email is required.',
            'email.unique' => 'Email already exists.',
            'password.required' => 'A password is required'
        ];
    }
}
