<?php

namespace App\Http\Requests;

use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class PokemonRequest extends BaseFormRequest
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
            'name' => 'regex:/^[a-zA-Z]+$/u|max:255',
            'id' => 'regex:/^\d+$/u'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.regex' => 'Letters only',
            'name.max' => 'Name query too long',
            'id.regex' => 'Only digits allowed'
        ];
    }
}
