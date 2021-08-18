<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CouponUpdateRequest extends FormRequest
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
            'name' => ['required',Rule::unique('coupons')->ignore(request()->id)->whereNull('deleted_at')->where('user_id', Auth::user()->id)],
            'type' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.unique' => request()->name.' is already taken!',
        ];
    }
}
