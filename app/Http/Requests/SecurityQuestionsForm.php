<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecurityQuestionsForm extends FormRequest
{
    /*
    *Route to redirect user to on validation failure.
    */
    protected $redirectAction = 'SecurityController@index';

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
            'question1' => 'required',
            'answer1' => 'required',
            'question2' => 'required',
            'answer2' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'question1.required' => 'Question # 1 is required',
            'answer1.required' => 'Answer # 1 is required',
            'question2.required' => 'Question # 2 is required',
            'answer2.required' => 'Answer # 2 is required',
        ];
    }
}
