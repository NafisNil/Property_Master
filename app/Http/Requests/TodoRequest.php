<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'assigned_by' => 'required',
            'description' => 'required',
            'objectives' => 'required',
            'person' => 'required',
            'ch_name' => 'required',
            'ch_office' => 'required',
            'ch_cellphone' => 'required|numeric',
            'ch_email' => 'required|email',
            'priority' => 'required',
            'deadline' => 'required',
            'location' => 'required',
            'instruction' => 'required',
            'room_date_one' => 'required',
            'room_time_one' => 'required',
        ];
    }
}
