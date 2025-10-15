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
    public function index(Request $request)
    {
        $permissions = Permission::paginate($this->perPage);


        if ($request->has('search')) {
            $permissions = Permission::where('name', 'like', '%' . $request->search . '%')->paginate($this->perPage);
        }

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
    public function show(Permission $permission) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        try {
            $request->validate([
                'name' => 'required|unique:permissions,name,' . $permission->id,

            ]);

            $permission->update(['name' => $request->name]);

            return redirect()->route('permissions.index')->with('success', 'Permiso Actualizado Correctamente.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Un error ha Ocurrido: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $permission = Permission::findById($id);

            if ($permission->roles()->count() > 0) {
                return redirect()->route('permissions.index')->with('error', 'No se puede eliminar este permiso porque tiene roles asociados.');
            }

            $permission->delete();
            return redirect()->route('permissions.index')->with('success', 'Permiso eliminado correctamente.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Un error ha Ocurrido: ' . $th->getMessage());
        }
    }
}
