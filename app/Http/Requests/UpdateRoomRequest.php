<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:room,name,' . $this->id,
            'capacity' => 'required|integer|min:1',
            'open' => 'required|date_format:H:i',
            'close' => 'required|date_format:H:i|after:open',
            'contact_person' => 'nullable|string|max:255',
        ];
    }
}
