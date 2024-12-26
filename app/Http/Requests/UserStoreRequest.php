<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow the user to perform this action
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'nophone' => 'nullable|string|max:15',
            'about' => 'nullable|string',
            'faculty' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'birthDate' => 'nullable|date',
            'role' => 'required|exists:roles,name',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama Pengguna harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'nophone.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            'about.string' => 'Tentang Pengguna harus berupa teks.',
            'faculty.string' => 'Fakultas harus berupa teks.',
            'major.string' => 'Jurusan harus berupa teks.',
            'birthDate.date' => 'Tanggal Lahir harus berupa tanggal yang valid.',
        ];
    }
}
