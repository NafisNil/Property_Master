<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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

            'priority' => 'required',
            'subject' => 'required|min:6',
            'details' => 'required',
            'required_action' => 'required',
            'due_date' => 'required',
            'receivers' => 'required',
            'acknowledge' => 'required'
        ];
    }
}
