<?php namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class CreateBlogPostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if(Auth::check()) return true;
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|min:5',
			'body' => 'required|min:5'
		];
	}

}
