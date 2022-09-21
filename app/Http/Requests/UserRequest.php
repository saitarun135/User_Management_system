<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch($this->method()){
            case 'POST' :
                return [
                    'name' => ['required','string'],
                    'email' => ['required','email'],
                    'password'=> ['required']
                ];
            case 'GET' :
                return [

                ];
            default :
                return [];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'please provide :attribute ',
            'name.string' => 'please enter valid string',
            'email.required' => ':attribute is missing please enter',
            'email.email' => 'please enter valid :attribute address'
        ];
    }
}
