<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required',
            'what' => 'required',
            'deadline' => 'required|date|after:now',
            'points' => 'required|gte:0',
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Ttitle is required!',
            'what.required' => 'description is required!',
            'deadline.required' => 'Deadline is required!',
            'points.required' => 'Points is required!'
        ];
    }
}
