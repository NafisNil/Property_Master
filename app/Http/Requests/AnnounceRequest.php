<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnounceRequest extends FormRequest
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
            'issued_by' => 'required',
            'priority' => 'required',
            'subject' => 'required',
            'details' => 'required',
            'due_date' => 'required',
            'receivers' => 'required',
            'acknowledge' => 'required'

        ];
    }
}
