<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Set to true to allow authorization
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_building' => 'required|exists:building,id', // Validate building ID
            'name' => 'required|string|max:255|unique:room,name', // Ensure 'rooms' table and not 'room'
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            'capacity' => 'required|integer|min:1',
            'open' => 'required|date_format:H:i',
            'close' => 'required|date_format:H:i|after:open', // Ensure 'close' time is after 'open'
            'contact_person' => 'nullable|string|max:255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Flash a flag to reopen the modal
        session()->flash('error2', 'Mohon isi inputan dengan benar');

        parent::failedValidation($validator);
    }
}
