<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountStoreForm extends FormRequest
{
    /*
    *Route to redirect user to on validation failure.
    */
    protected $redirectAction = 'AccountsController@index';

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
            'category_id'     => 'required|numeric',
            'title'           => 'required|min:3|max:35',
            'link'            => 'max:155',
            'login_id'        => 'required|min:3|max:155',
            'login_password'  => 'required|min:3|max:155',
            'additional_info' => 'max:255',
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
            'category_id.required'    => 'Category is required',
            'category_id.numeric'     => 'Invalid Category',
            'title.required'          => 'Title is required',
            'title.min'               => 'Title should have minimum 3 characters',
            'title.max'               => 'Title can have maximum 35 characters',
            'link.max'                => 'Website Link can have maximum 155 characters',
            'login_id.required'       => 'Login ID is required to add an account to the vault',
            'login_id.min'            => 'Login ID should contain minimum 3 characters',
            'login_id.max'            => 'Login ID can have maximum 155 characters',
            'login_password.required' => 'Password for the Account is required',
            'login_password.min'      => 'Login Password needs to be of minimum 3 characters',
            'login_password.max'      => 'Login Password cannot exceed 155 character limit',
            'additional_info.max'     => 'Additional Info cannot exceed 255 character limit',
        ];
    }
}
