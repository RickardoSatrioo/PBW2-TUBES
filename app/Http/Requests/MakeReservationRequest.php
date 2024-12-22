<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class MakeReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'id_room' => 'required|exists:room,id',
            'purpose' => 'required|string|max:255',
            'startDateTime' => 'required|date|after_or_equal:now',
            'endDateTime' => 'required|date|after:startDateTime',
            'proposal' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ];
    }

    public function messages(): array {
        return [
            'id_room.required' => 'Ruangan harus dipilih.',
            'id_room.exists' => 'Ruangan tidak valid.',
            'purpose.required' => 'Tujuan harus diisi.',
            'startDateTime.required' => 'Waktu mulai harus dipilih.',
            'startDateTime.after_or_equal' => 'Waktu mulai tidak boleh di masa lalu.',
            'endDateTime.required' => 'Waktu selesai harus dipilih.',
            'endDateTime.after' => 'Waktu selesai harus setelah waktu mulai.',
            'proposal.required' => 'File proposal harus diunggah.',
            'proposal.mimes' => 'File proposal harus berupa PDF, DOC, atau DOCX.',
            'proposal.max' => 'Ukuran file proposal maksimal 2MB.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Flash a flag to reopen the modal
        session()->flash('openModal', true);
        session()->flash('error2', 'Mohon isi inputan terlebih dahulu');

        parent::failedValidation($validator);
    }
}
