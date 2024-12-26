<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $viewIndex = 'index';
    private $viewCreate = 'form';
    private $viewEdit = 'form';
    private $routePrefix = 'admin.user.';

    /**
     * Display a listing of the users.
     */
    public function index()
    {
        return view($this->routePrefix . $this->viewIndex, [
            'routePrefix' => $this->routePrefix,
            'title' => 'User List'
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        try {
            $data = [
                'model' => new User(),
                'method' => 'POST',
                'route' => route($this->routePrefix . 'store'),
                'roles' => \Spatie\Permission\Models\Role::all(),
                'button' => 'CREATE',
                'title' => 'FORM DATA CREATE USER',
            ];
            return view($this->routePrefix . $this->viewCreate, $data);
        } catch (Exception $e) {
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Menemukan User!");
        }
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(UserStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            // Hash the password before saving
            $data['password'] = Hash::make($data['password']);

            // Handle the avatar upload if it's provided
            if ($request->hasFile('avatar')) {
                $data['avatar'] = $request->file('avatar')->store('avatars');
            }

            // Create the user
            $user = User::create($data);

            if ($request->role && $user->roles->first()->name !== $request->role) {
                $user->syncRoles([$request->role]);
            }
            DB::commit();

            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', "Berhasil Membuat User!");
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Membuat User!");
        }
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        try {
            $data = [
                'model' => $user,
                'title' => 'USER DETAIL',
            ];
            return view($this->routePrefix . 'show', $data);
        } catch (Exception $e) {
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Menemukan User!");
        }
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        try {
            $data = [
                'model' => $user,
                'method' => 'PUT',
                'roles' => \Spatie\Permission\Models\Role::all(),
                'route' => route($this->routePrefix . 'update', $user->id),
                'button' => 'UPDATE',
                'title' => 'FORM DATA EDIT USER',
            ];
            return view($this->routePrefix . $this->viewEdit, $data);
        } catch (Exception $e) {
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Menemukan User!");
        }
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            // Hash the password if it's updated
            if ($request->filled('password')) {
                $data['password'] = Hash::make($data['password']);
            } else {
                // Remove password if not updated
                unset($data['password']);
            }

            // Handle the avatar upload if it's provided
            if ($request->hasFile('avatar')) {
                // Delete old avatar file if it exists
                if ($user->avatar) {
                    Storage::delete($user->avatar);
                }
                $data['avatar'] = $request->file('avatar')->store('avatars');
            }

            if ($request->role && $user->roles->first()->name !== $request->role) {
                $user->syncRoles([$request->role]);
            }

            // Update the user
            $user->update($data);
            DB::commit();

            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', "Berhasil Memperbarui User!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Memperbarui User!");
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            // Delete avatar if exists
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            // Delete user
            $user->delete();
            DB::commit();

            return redirect()->route($this->routePrefix . $this->viewIndex)->with('success', "Berhasil Menghapus User!");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route($this->routePrefix . $this->viewIndex)->with('error', "Gagal Menghapus User!");
        }
    }

    /**
     * Get list of users for DataTables.
     */
    public function getList(Request $request)
    {
        if ($request->ajax()) {

            $users = User::latest()->get(); // Get latest users

            // Using DataTables to render the data
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route($this->routePrefix . 'edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                        <form action="' . route('admin.user.status', $row->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            <button type="submit" class="btn btn-sm ' . ($row->status ? 'btn-success' : 'btn-danger') . '">
                                ' . ($row->status ? 'Aktif' : 'Tidak Aktif') . '
                            </button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
