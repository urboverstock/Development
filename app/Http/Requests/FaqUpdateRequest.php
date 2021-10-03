<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FaqUpdateRequest extends FormRequest
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
            'question' => 'required',
            'answer' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'question is required!'
        ];
    }
}
