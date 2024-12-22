<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        try {
            $buildings = Building::with('room')->where('status', true)->get();

            return response()->json([
                'message' => 'Building list fetched successfully',
                'data' => $buildings,
                'error' => false, // Tidak ada error
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch building list',
                'error' => true,
                'data' => [],
                'details' => $e->getMessage(), // Menampilkan pesan error
            ], 500); // Kode status 500 untuk error server
        }
    }

    public function show($id)
    {
        try {
            $building = Building::with('room')->where('status', true)->findOrFail($id);

            return response()->json([
                'message' => 'Building details fetched successfully',
                'data' => $building,
                'error' => false, // Tidak ada error
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Building not found or failed to fetch details',
                'error' => true,
                'data' => null,
                'details' => $e->getMessage(), // Menampilkan pesan error
            ], 404); // Kode status 404 untuk resource tidak ditemukan
        }
    }
}
