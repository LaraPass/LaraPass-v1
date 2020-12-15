<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateForm extends FormRequest
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
            'name' => 'required|min:3|max:190',
            'support_pin' => 'required|numeric|digits:4',
            'rng_level' => 'required|numeric|digits:1',
            'dob' => 'required',
            'mobile' => 'required|numeric',
            'country' => 'required',
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
            'name.required' => 'Full Name is required',
            'name.min' => 'Name must be of minimum 3 characters',
            'name.max' => 'Name can be of maximum 190 characters',
            'support_pin.required'  => 'Support PIN is required',
            'support_pin.numeric'  => 'Support PIN can only be numeric',
            'support_pin.digits'  => 'Only 4 digit Support PIN is accepted',
            'rng_level.required'  => 'Random Generator Difficutly is required',
            'rng_level.numeric'  => 'Invalid Random Generator Setting',
            'rng_level.digits'  => 'Invalid Random Generator Setting',
            'dob.required' => 'Date of Birth is required',
            'mobile.required' => 'Mobile Number is required',
            'mobile.numeric' => 'Mobile Number can only be numeric',
            'country' => 'Country is required',
        ];
    }
}
