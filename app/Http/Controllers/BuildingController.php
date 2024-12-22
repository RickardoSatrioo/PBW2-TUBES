<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BuildingController extends Controller
{
    private $viewIndex = 'index';
    private $viewForm = 'form';
    private $routePrefix = 'admin.building.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view($this->routePrefix . $this->viewIndex, [
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Gedung'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $data = [
                'model' => new Building(),
                'method' => 'POST',
                'route' => route($this->routePrefix . '.store'),
                'button' => 'CREATE',
                'title' => 'Form Tambah Gedung',
            ];
            return view($this->routePrefix . $this->viewForm, $data);
        } catch (\Exception $e) {
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', 'Gagal Membuka Form Gedung!');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['image'] = $request->file('image')->store('buildings');
            Building::create($data);
            DB::commit();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', 'Berhasil Menambahkan Gedung!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', 'Gagal Menambahkan Gedung!');
        }
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $buildings = Building::latest()->get();

            return DataTables::of($buildings)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                    <a href="' . route('admin.building.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                    <form action="' . route('admin.building.destroy', $row->id) . '" method="POST" style="display:inline;" class="delete-form">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm delete-button">Hapus</button>
                    </form>
                    <form action="' . route('admin.building.status', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        <button type="submit" class="btn btn-sm ' . ($row->status ? 'btn-success' : 'btn-danger') . '">
                            ' . ($row->status ? 'Aktif' : 'Non-Aktif') . '
                        </button>
                    </form>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        try {
            $data = [
                'model' => $building,
                'method' => 'PUT',
                'route' => route($this->routePrefix . '.update', $building->id),
                'button' => 'UPDATE',
                'title' => 'Form Edit Gedung',
            ];
            return view($this->routePrefix . $this->viewForm, $data);
        } catch (\Exception $e) {
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', 'Gagal Menemukan Gedung!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuildingRequest $request, Building $building)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                Storage::delete($building->image);
                $data['image'] = $request->file('image')->store('buildings');
            }
            $building->update($data);
            DB::commit();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', 'Berhasil Memperbarui Gedung!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', 'Gagal Memperbarui Gedung!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        DB::beginTransaction();
        try {
            Storage::delete($building->image);
            $building->delete();
            DB::commit();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', 'Berhasil Menghapus Gedung!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', 'Gagal Menghapus Gedung!');
        }
    }
}
