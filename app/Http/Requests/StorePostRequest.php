<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorePostRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules =  [
            
            'name'          => "required",
            'age'           => "required",
            'dob'           => "required|date_format:Y-m-d|before:today",
            'profession'    => "required",
            'locality'      => "required",
            'no_of_guests'  => "required|integer|min:0|max:2",
            'address'       => "required|alpha|min:20|max:255",
            
        ];

        return $rules;
    }



    public function messages()
    {
         $messages =  [
            'name.required'        => 'name is required.',
            'age.required'        => 'age is required.',
            'dob.required'        => 'date of birth is required.',
            'profession.required'        => 'Name is required.',
            'locality.required'        => 'locality is required.',
            'no_of_guests.required'        => 'number of guests is required.',
            'address.required'        => 'address is required.',
            
        ];

        return $messages;
    }
}
