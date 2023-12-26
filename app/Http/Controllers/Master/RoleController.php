<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\PermissionGroup;
class RoleController extends Controller
{
    public function index()
    {
        $all_roles = Role::orderBy('id', 'DESC')->get();

        return view ('Master.usermanagement.role.index',compact('all_roles'));
    }

    public function create()
    {
        $permissionGroups = PermissionGroup::with('permissions')->get();
        $permission = Permission::get();
        return view('Master.usermanagement.role.create',compact('permission','permissionGroups'));
    }

    public function store(Request $request)
    {
        // dd( $request);
        $request->validate([
             'name'=>'required|regex:/^[A-Za-z ]+$/',
         ]);

    $role = Role::create(['name' => $request->input('name')]);
    $role->syncPermissions($request->input('permission'));

    if ($role) {
        return redirect()->route('role.index')
          ->with('success', 'Role created successfully');
    }

    return back()->with('failure', 'Please try again');

    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissionGroups = PermissionGroup::with('permissions')->get();
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        // dd($rolePermissions);
        return view('Master.usermanagement.role.edit', compact('role', 'permission', 'rolePermissions','permissionGroups'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index')
                        ->with('success','Role updated successfully');
    }

    public function delete(Role $role)
    {
        $role->delete();

         if ($role) {
            return redirect()->route('role.index')
              ->with('success', 'Role deleted successfully');
        }

        return back()->with('failure', 'Please try again');

    }
}