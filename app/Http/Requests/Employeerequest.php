<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Employeerequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'email' => 'email|required|unique:employees|unique:managers',
                    'fname' => 'required|string',
                    'doj' => 'required',
                    'dol' => 'sometimes',
                    'current_date' => 'sometimes|nullable',
                    'image' => 'sometimes|nullable',
                ];
            default:
                return [];
        }
    }

    public function messages()
    {
        return [
            'email.required' => 'The Email field is required',
            'email.email' => 'Please enter valid email',
            'fname.required' => 'Please enter full name',
            'doj.required' => 'Please Provide Joining Date',
        ];
    }
}
