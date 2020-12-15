<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailerSettingsUpdateForm extends FormRequest
{
    /*
    *Route to redirect user to on validation failure.
    */
    protected $redirectAction = 'Admin\AdminController@settings' ;

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
            'app_mail_driver' => 'required|min:3|max:35',
            'app_mail_sender' => 'required|min:3|max:55',
            'app_mail_sender_name' => 'required|min:3|max:55',
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
            'app_mail_driver.required' => 'Mailer Driver is required',
            'app_mail_driver.min' => 'Mailer Driver should have minimum 3 characters',
            'app_mail_driver.max' => 'Mailer Driver can have maximum 35 characters',
            'app_mail_sender.required' => 'Mailer Sender Address is required',
            'app_mail_sender.min' => 'Mailer Sender Address should have minimum 3 characters',
            'app_mail_sender.max' => 'Mailer Sender Address can have maximum 35 characters',
            'app_mail_sender_name.required' => 'Mailer Sender Name is required',
            'app_mail_sender_name.min' => 'Mailer Sender Name should have minimum 3 characters',
            'app_mail_sender_name.max' => 'Mailer Sender Name can have maximum 35 characters',
        ];
    }
}
