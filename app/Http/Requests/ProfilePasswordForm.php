<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePasswordForm extends FormRequest
{
    /*
    *Route to redirect user to on validation failure.
    */
    protected $redirectAction = 'UserProfileController@index';

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
            'current_password' => 'required',
            'password'         => 'required|confirmed|min:6',
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
            'current_password.required' => 'Current Password is required',
            'passsword.required'        => 'New Password is required',
            'password.confirmed'        => 'Password & Confirm Password do not match',
            'password.min'              => 'New Password should be of minimum 6 characters',
        ];
    }
}
