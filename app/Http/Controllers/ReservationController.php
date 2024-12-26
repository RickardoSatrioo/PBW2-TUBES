<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeReservationRequest;
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

    public function makeReservation(MakeReservationRequest $request)
    {
       DB::beginTransaction();

        try {
            // Validasi untuk memeriksa apakah waktu yang dipilih sudah dipesan
            $existingReservation = Reservation::where('id_room', $request->id_room)
                ->where(function ($query) use ($request) {
                    $query->whereBetween('startDate', [$request->startDateTime, $request->endDateTime])
                        ->orWhereBetween('endDate', [$request->startDateTime, $request->endDateTime])
                        ->orWhere(function ($query) use ($request) {
                            $query->where('startDate', '<=', $request->startDateTime)
                                ->where('endDate', '>=', $request->endDateTime);
                        });
                })
                ->first();

                if ($existingReservation) {
                    DB::rollBack();

                    // Ambil informasi waktu yang bertabrakan
                    $startDate = $existingReservation->startDate;
                    $endDate = $existingReservation->endDate;

                    // Format waktu untuk tampil lebih baik
                    $date = \Carbon\Carbon::parse($startDate)->format('d M Y');
                    $formattedStartDate = \Carbon\Carbon::parse($startDate)->format('H:i');
                    $formattedEndDate = \Carbon\Carbon::parse($endDate)->format('H:i');

                    session()->flash('openModal', true);
                    return redirect()->back()->withInput()->with('error', "Waktu yang dipilih sudah dipesan pada tanggal $date dari pukul $formattedStartDate hingga $formattedEndDate. Silakan pilih waktu lain.");
                }


            // Hitung durasi dalam jam
            $duration = \Carbon\Carbon::parse($request->startDateTime)->diffInHours(\Carbon\Carbon::parse($request->endDateTime));

            // Simpan data reservasi
            $reservation = Reservation::create([
                'id_room' => $request->id_room,
                'created_by' => auth()->user()->id,
                'purpose' => $request->purpose,
                'startDate' => $request->startDateTime,
                'endDate' => $request->endDateTime,
                'file_proposal' => $request->file('proposal')->store('file_proposals'),
                'duration' => $duration . ' Jam',
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()->route('landing')->with('success', "Berhasil membuat reservasi!");
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('openModal', true);
            return redirect()->back()->withInput()->with('error', "Gagal membuat reservasi! Silakan coba lagi.");
        }
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

    public function getListUser(Request $request)
    {
        // Get the status from query string (defaults to 'pending')
        $status = $request->query('status', 'pending');

        // Retrieve reservations based on status
        $reservations = Reservation::with(['room', 'createdBy', 'approvedBy'])
            ->where('status', $status)
            ->where('created_by', auth()->user()->id)
            ->get();

        return DataTables::of($reservations)
            ->addColumn('reservation_details', function ($reservation) {
                return view('history-list', compact('reservation'));
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


    public function updateStatusUser(Request $request, Reservation $reservation)
    {
        DB::beginTransaction();
        try {

            if($request->status != 'canceled') {
                DB::rollBack();
                return redirect()->route('user.history_reservation')->with('error', "Gagal Memperbarui Status Reservasi!");
            }

            $data = [
                'status' => $request->status,
            ];

            $reservation->update($data);
            DB::commit();
            return redirect()->route('user.history_reservation')->with('success', "Berhasil Memperbarui Status Reservasi!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('user.history_reservation')->with('error', "Gagal Memperbarui Status Reservasi!");
        }
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        DB::beginTransaction();
        try {

            $data = [
                'status' => $request->status,
                'approved_by' => auth()->user()->id,
            ];

            if ($request->reason) {
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
