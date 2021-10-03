<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqStoreRequest extends FormRequest
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

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'question.required' => 'question is required!',
            // 'answer.required' => 'answer is required!'
        ];
    }
}
