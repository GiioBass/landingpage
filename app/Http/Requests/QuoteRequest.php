<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
            'car_type' => 'required',
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'number_phone' => 'required|numeric',
            'department' => 'required',
            'municipality' => 'required',
            'policies' => 'accepted|boolean'
        ];
    }
}
