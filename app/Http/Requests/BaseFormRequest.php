<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    public function all($keys = null)
    {
        return array_replace_recursive(
            parent::all($keys),
            $this->route()->parameters()
        );
    }
}
