<?php

namespace ChopBox\Http\Requests;

use ChopBox\Http\Requests\Request;

class ChopsFormRequest extends Request {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
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
			'about'=> 'required|max:255',
			'image' => 'required|between:1,4'
		];
    }
}
