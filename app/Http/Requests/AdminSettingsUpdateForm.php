<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSettingsUpdateForm extends FormRequest
{
    /*
    *Route to redirect user to on validation failure.
    */
    protected $redirectAction = 'Admin\AdminController@settings';

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
            'app_name'             => 'required|min:3|max:35',
            'app_description'      => 'min:3|max:191',
            'app_email'            => 'required',
            'app_mail_sender'      => 'required',
            'app_mail_sender_name' => 'required',
            'app_logo'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'app_logo_white'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'app_name.required'             => 'Application Name is required',
            'app_name.min'                  => 'Application Name should have minimum 3 characters',
            'app_name.max'                  => 'Application Name can have maximum 35 characters',
            'app_description.max'           => 'Application Description should have minimum 3 characters',
            'app_description.max'           => 'Application Description can have maximum 191 characters',
            'app_email.required'            => 'Application Email is required',
            'app_mail_sender.required'      => 'Sender Email is required',
            'app_mail_sender_name.required' => 'Sender Name is required',
        ];
    }
}
