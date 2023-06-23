<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
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
            'companySymbol' => ['required'],
            'startDate'     => ['required',  'date', 'before_or_equal:endDate'],
            'endDate'       => ['required',  'date', 'after_or_equal:startDate', 'before_or_equal:today'],
            'email'         => ['required', 'email'],
        ];
    }
}
