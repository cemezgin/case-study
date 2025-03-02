<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
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
        //extend name with contains word
        return [
            'name' => 'required | min:10',
            'rating' => 'required | numeric | between:1,5',
            'category' => 'required | in:hotel, alternative, hostel, lodge, resort, guest-house',
            'reputation' => 'required | numeric | min:0 | max: 1000',
            'price' => 'required | numeric',
            'availability' => 'required | numeric',
            'image' => 'regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.'
        ];
    }
}
