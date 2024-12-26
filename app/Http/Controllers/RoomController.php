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
    private $routePrefix = 'admin.room.';
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
                'method' => 'POST',
                'route' => route($this->routePrefix . 'store'),
                'button' => 'CREATE',
                'title' => 'FORM DATA EDIT RUANGAN',
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

    public function getList(Request $request)
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
                ->editColumn('open', function ($row) {
                    return \Carbon\Carbon::parse($row->open)->format('H.i');
                })
                ->editColumn('close', function ($row) {
                    return \Carbon\Carbon::parse($row->close)->format('H.i');
                })
                ->addColumn('action', function ($row) {
                    return '
                    <a href="' . route('admin.room.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                    <form action="' . route('admin.room.status', $row) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        <button type="submit" class="btn btn-sm ' . ($row->status ? 'btn-success' : 'btn-danger') . '">
                            ' . ($row->status ? 'Aktif' : 'Non-Aktif') . '
                        </button>
                    </form>
                ';
                })
                ->rawColumns(['foto_ruangan', 'action', 'open', 'close'])
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
                'route' => route($this->routePrefix . 'update', $room->id),
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
    public function updateStatus(Room $room)
    {
        DB::beginTransaction();
        try {
            $room->update([
                'status' => !$room->status
            ]);
            DB::commit();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', "Berhasil Memperbarui Status Ruangan!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Memperbarui Status Ruangan!");
        }
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('search');
            $limit = $request->input('limit', 20);
            $page = $request->input('page', 1);

            // Start building the query with eager loading of the 'building' relationship
            $roomsQuery = Room::with('building')
                ->leftJoin('building', 'room.id_building', '=', 'building.id') // Explicitly join the building table
                ->select('room.*', 'building.name as building_name');

            // Apply search conditions if the query is not empty
            if (!empty($query)) {
                $roomsQuery->where(function ($queryBuilder) use ($query) {
                    $searchTerm = '%' . strtolower($query) . '%'; // Prepare the search term for LIKE query
                    $queryBuilder->whereRaw('LOWER(room.name) LIKE ?', [$searchTerm])
                        ->orWhereRaw('LOWER(room.capacity) LIKE ?', [$searchTerm])
                        ->orWhereRaw('LOWER(building.name) LIKE ?', [$searchTerm]); // Query the building's name properly
                });
            }

            // Paginate the results
            $rooms = $roomsQuery->paginate($limit, ['*'], 'page', $page);

            // dd(count($rooms));
            // Build the HTML content for the room cards
            $htmlContent = $rooms->map(function ($room) {
                return view('room_card_list', compact('room'))->render();
            })->implode('');

            // Return the JSON response with the requested data structure
            return response()->json([
                'message' => 'Room search results',
                'data' => $rooms->items(), // Data hasil pencarian
                'current_page' => $rooms->currentPage(),
                'last_page' => $rooms->lastPage(),
                'total' => $rooms->total(),
                'per_page' => $rooms->perPage(),
                'html' => $htmlContent,
                'hasMore' => $rooms->hasMorePages(),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while performing the search',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
