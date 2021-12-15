<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserPostUpdateRequest extends FormRequest
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
            'title' => ['required',Rule::unique('user_posts')->ignore(request()->id)->whereNull('deleted_at')->where('user_id', Auth::user()->id)],
            'description' => 'required',
            'file' => 'max:2048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'title.unique' => request()->title.' is already taken!',
            'file.max' => 'The :attribute failed to upload.'
        ];
    }
}
