<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
        return [

             'first_name'=>[
                'required',
                'string'
             ],
             'full_name'=>[
                'required',
                'string'
             ],
              'email'=>[
                'required',
                'string',
                'max:30'
             ],
             'password'=>[
                'required',
                'string',
             ],
              'contact_name'=>[
                'required',
                'string',

             ],
              'contact_number'=>[
                'required',

             ],
             'contact_email'=>[
                'required',
                'max:30',

             ],
              'father_name'=>[
                'required',
                'string',

             ],
             'mother_name'=>[
                'required',
                'string',

             ],
             'address'=>[
                'required',
                'string',

             ],
             'image'=>[
                'required',
                'nullable',
                'mimes:jpg,jpeg,png'

             ],
        ];
    }
}
