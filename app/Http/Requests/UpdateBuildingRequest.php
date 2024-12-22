<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:building,name,' . $this->id,
            'description' => 'nullable|string|max:500',
            'status' => 'required|boolean',
        ];
    }
}
