<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Building;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{

    private $viewIndex = 'index';
    private $viewCreate = 'form';
    private $viewEdit = 'form';
    private $routePrefix = 'admin.menu.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view($this->routePrefix . $this->viewIndex, [
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Ruangan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $data = [
                'model' => new Room(),
                'method' => 'PUT',
                'route' => route($this->routePrefix . '.store'),
                'button' => 'UPDATE',
                'title' => 'FORM DATA EDIT MENU',
            ];
            return view($this->routePrefix . $this->viewCreate, $data);
        } catch (Exception $e) {
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Menemukan Ruangan!");;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['image'] = $request->file('image')->store('rooms');
            Room::create($data);
            DB::commit();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', "Berhasil Membuat Ruangan!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Membuat Ruangan!");;
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(Request $request)
    {
        if ($request->ajax()) {

            $rooms = Room::latest()->get(); // Mengambil data ruangan terbaru

            // Menggunakan DataTables untuk merender data
            return DataTables::of($rooms)
                ->addIndexColumn()
                ->addColumn('building_name', function ($row) {
                    return $row->building->name; // Menampilkan nama gedung
                })
                ->addColumn('foto_ruangan', function ($row) {
                    return '<img src="' . asset("storage/$row->image") . '" width="100" class="mt-2">';
                })
                ->addColumn('action', function ($row) {
                    return '
                    <a href="' . route('admin.room.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                    <form action="' . route('admin.room.destroy', $row->id) . '" method="POST" style="display:inline;" class="delete-form">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
                    </form>
                    <form action="' . route('admin.room.status', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        <button type="submit" class="btn btn-sm ' . ($row->status ? 'btn-success' : 'btn-danger') . '">
                            ' . ($row->status ? 'Aktif' : 'Non-Aktif') . '
                        </button>
                    </form>
                ';
                })
                ->rawColumns(['foto_ruangan', 'action'])
                ->make(true);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        try {
            $room = Room::findOrFail($room->id);

            $data = [
                'model' => $room,
                'method' => 'PUT',
                'route' => route($this->routePrefix . '.update', $room->id),
                'button' => 'UPDATE',
                'title' => 'FORM DATA EDIT MENU',
            ];
            return view($this->routePrefix . $this->viewEdit, $data);
        } catch (Exception $e) {
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Menemukan Ruangan!");;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['image'] = $request->file('image')->store('rooms');
            if ($request->hasFile('image')) {
                Storage::delete($data['image']);
                $data['image'] = $request->file('image')->store('rooms');
            }
            Room::find($room->id)->update($data);
            DB::commit();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', "Berhasil Memperbarui Ruangan!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Memperbarui Ruangan!");;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateStatus(Building $building)
    {
        DB::beginTransaction();
        try {
            // Toggle the current status
            $building->update([
                'status' => !$building->status
            ]);
            DB::commit();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', "Berhasil Memperbarui Status Gedung!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Memperbarui Status Gedung!");
        }
    }
}
