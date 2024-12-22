<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        DB::beginTransaction(); // Mulai transaksi database

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'nophone' => ['required', 'regex:/^(08[1-9][0-9]{6,9})$/'], // Format nomor telepon ID
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // Membuat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'nophone' => $request->nophone,
                'password' => Hash::make($request->password),
            ]);

            // Membuat token untuk user
            $token = $user->createToken('auth_token')->plainTextToken;

            DB::commit(); // Commit transaksi jika semua berhasil

            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
                'token' => $token,
                'error' => false, // Tidak ada error
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi jika terjadi error

            return response()->json([
                'message' => 'Registration failed',
                'error' => true,
                'details' => $e->getMessage(), // Mengirimkan pesan error
            ], 500); // Kode status 500 untuk error server
        }
    }

    public function login(Request $request)
    {
        try {
            $loginField = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

            $credentials = [
                $loginField => $request->input('email'),
                'password' => $request->input('password'),
            ];

            if (!Auth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid credentials', 'error' => true], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
                'error' => false, // Tidak ada error
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Login failed',
                'error' => true,
                'details' => $e->getMessage(), // Menampilkan pesan error
            ], 500); // Kode status 500 untuk error server
        }
    }
}
