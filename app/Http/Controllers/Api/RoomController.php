<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        try {
            $rooms = Room::with('building')->where('status', true)->get();

            return response()->json([
                'message' => 'Room list fetched successfully',
                'data' => $rooms,
                'error' => false, // Tidak ada error
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch room list',
                'error' => true,
                'data' => [],
                'details' => $e->getMessage(), // Menampilkan pesan error
            ], 500); // Kode status 500 untuk error server
        }
    }

    public function show($id)
    {
        try {
            $room = Room::with('building')->where('status', true)->findOrFail($id);

            return response()->json([
                'message' => 'Room details fetched successfully',
                'data' => $room,
                'error' => false, // Tidak ada error
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Room not found or failed to fetch details',
                'error' => true,
                'data' => null,
                'details' => $e->getMessage(), // Menampilkan pesan error
            ], 404); // Kode status 404 untuk resource tidak ditemukan
        }
    }
}
