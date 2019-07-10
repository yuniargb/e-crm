<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimoniRequest extends FormRequest
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
            'invoice_id' => 'exists:invoices,id|unique:testimonis,invoice_id|required',
            'pesan' => 'required|min:5',
            'rating' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Please fill this field',
            'min' => 'Message is too short, please give us some details',
            'exists' => 'Sorry your Invoice number is invalid',
            'unique' => 'This Invoice number has used',
        ];
    }
}
