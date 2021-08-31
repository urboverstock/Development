<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementStoreRequest extends FormRequest
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
            'banner' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'email.required' => 'Email is required!',
            // 'name.required' => 'Name is required!',
            // 'password.required' => 'Password is required!'
        ];
    }
}
