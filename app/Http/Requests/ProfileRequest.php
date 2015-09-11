<?php

namespace ChopBox\Http\Requests;

use ChopBox\Http\Requests\Request;

class ProfileRequest extends Request
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
        'firstname' => 'required|min:2',
        'lastname' => 'required|min:2',
        'location' => 'required|min:2',
        'best_food' => 'required|min:2',
        'gender' => 'required' 
        ];
    }
}
