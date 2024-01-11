<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplainRequest extends FormRequest
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
            //
            'reported_by' => 'required',
            'time' => 'required',
            'complain_type' => 'required',
            'desc' => 'required',
            'happened_before' => 'required',
            'people' => 'required',
            'receivers' => 'required',
            'acknowledge' => 'required',
            'status' => 'required',
            'post' => 'required'
        ];
    }
}
