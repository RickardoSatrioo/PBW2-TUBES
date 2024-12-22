<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.verif-reservation', [
            'title' => 'Verifikasi Pemesanan Ruangan'
        ]);
    }

    public function getList(Request $request)
    {
        // Get the status from query string (defaults to 'pending')
        $status = $request->query('status', 'pending');

        // Retrieve reservations based on status
        $reservations = Reservation::with(['room', 'createdBy', 'approvedBy'])
            ->where('status', $status)
            ->get();

        return DataTables::of($reservations)
            ->addColumn('reservation_details', function ($reservation) {
                return view('admin.reservation-list', compact('reservation'));
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function makeReservation(Request $request) {

    }

    public function updateStatus(Request $request, Reservation $reservation) {
        DB::beginTransaction();
        try {

            $data = [
                'status' => $request->status,
                'approved_by' => auth()->user()->id,
            ];
            if($request->reason) {
                $data['reason_reject'] = $request->reason;
            }
            $reservation->update($data);
            DB::commit();
            return redirect()->route('admin.admin.verif-reservation')->with('success', "Berhasil Memperbarui Status Reservasi!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.admin.verif-reservation')->with('error', "Gagal Memperbarui Status Reservasi!");
        }
    }
}
