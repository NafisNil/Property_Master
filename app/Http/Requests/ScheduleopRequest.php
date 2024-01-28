<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleopRequest extends FormRequest
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
            'type_id' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'cycle_id' => 'required',
            'property_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'next_one' =>'required|date',
            'instruction' => 'required',
            'contact_person' => 'required',
            
        ];
    }
}
