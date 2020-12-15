<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatabaseSettingsUpdateForm extends FormRequest
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
            'db_mysql_host' => 'required',
            'db_mysql_port' => 'required',
            'db_mysql_database' => 'required',
            'db_mysql_username' => 'required',
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
            'db_mysql_host.required' => 'Database Hostname is required',
            'db_mysql_port.required' => 'Database Port No. is required',
            'db_mysql_database.required' => 'Database Name is required',
            'db_mysql_username.required' => 'Database Username is required',
        ];
    }
}
