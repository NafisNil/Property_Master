<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RemainderRequest extends FormRequest
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
            'subject' => 'required',
            'details' => 'required',
            'priority' => 'required',
            'location' => 'required',
            'time' => 'required',
            'action' => 'required',
            'due_date' => 'required',
            'receivers' => 'required',
          
        ];
    }
}
