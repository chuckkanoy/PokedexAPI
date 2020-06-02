<?php

namespace App\Http\Requests;

use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CaptureRequest extends BaseFormRequest
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
            'id' => 'regex:/^\d+$/u'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'id.regex' => 'Only digits allowed'
        ];
    }
}
