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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'phone' => 'required',
            'email'=>'bail|required|unique:users|max:255',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'company_name' => 'required',
            'country' => 'required',
            'street_address' => 'required',
            'postalcode_zip' => 'required',
            'town_city' => 'required',
            'level' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'phone.required' => 'Please enter your phone',
            'email.required' => 'Please enter your email',
            'email.unique' => 'Email already in use',
            'email.email' => 'Invalid email format.',
            'email.max' => 'Email cannot be larger than 255 characters',
            'password.required' => 'Please enter your password',
            'password_confirmation.required' => 'Please enter your password_confirmation',
            'password_confirmation.same' => 'Passwords do not match. Please re-enter',
            'company_name.required' => 'Please enter your company_name',
            'country.required' => 'Please enter your country',
            'street_address.required' => 'Please enter your street_address',
            'postalcode_zip.required' => 'Please enter your postalcode_zip',
            'town_city.required' => 'Please enter your town_city',
            'level.required' => 'Please enter your level',
            'description.required' => 'Please enter your description',
        ];
    }
}
