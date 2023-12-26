<?php

namespace App\Http\Controllers\Master;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        // $permission = Permission::get();
        $all_roles = Role::orderBy('id', 'DESC')->get();
        return view('Master.usermanagement.permission.index', compact('all_roles'));
    }

    public function create()
    {
        return view('Master.usermanagement.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|regex:/^[A-Za-z ]+$/',

        ]);

        $input = [
            'name' => $request['name'],
        ];

        $permission = $input;
        Permission::create($permission);

        if ($permission) {
            return redirect()->route('permission.index')
                ->with('success', 'Permission created successfully');
        }

        return back()->with('failure', 'Please try again');
    }

    public function edit(string $id)
    {
        $permission = Permission::find($id);

        return view('Master.usermanagement.permission.edit', compact('permission'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z ]+$/',

        ]);

        $input = [
            'name' => $request['name'],
        ];

        $permission = Permission::find($id);
        $permission->update($input);

        if ($permission) {
            return redirect()->route('permission.index')
                ->with('success', 'Permission updated successfully');
        }

        return back()->with('failure', 'Please try again');
    }

    public function delete(string $id)
    {
        $permission = Permission::find($id);
        $permission->delete();


        if ($permission) {
            return redirect()->route('permission.index')
                ->with('success', 'Permission deleted successfully');
        }

        return back()->with('failure', 'Please try again');
    }
}
