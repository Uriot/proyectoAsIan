<?php

namespace App\Http\Controllers;

//use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public $perPage = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate($this->perPage);
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:permissions,name',

            ]);

            Permission::create(['name' => $request->name]);

            return redirect()->route('permissions.index')->with('success', 'Permiso Creado Correctamente.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Un error ha Ocurrido: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
