<?php

namespace App\Http\Requests;

use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class AttributeRequest extends BaseFormRequest
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
            'ability' => 'regex:/^[-a-zA-Z]+$/u|max:255',
            'type' => 'regex:/^[-a-zA-Z]+$/u',
            'group' => 'regex:/^[-0-9a-zA-Z]+$/u'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'ability.regex' => 'Letters only',
            'ability.max' => 'Name query too long',
            'type.regex' => 'Letters only',
            'group.regex' => 'No special characters allowed'
        ];
    }
}
