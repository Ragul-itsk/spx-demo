<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserController extends Controller
{
     public function index()
     {
        $user = User::get();
        return view('Master.usermanagement.user.index',compact('user'));
     }

     public function create()
     {
        $role = Role::get();
        $branch = Branch::get();
        return view('Master.usermanagement.user.create',compact('role','branch'));
     }

     public function store(Request $request)
     {
        // dd( $request);
         $this->validate($request, [
            'name'=>'required',
            'email'=>'required|unique:users',
            'mobile'=>'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required|same:password',
            'role' => 'required',
            'branch_id' => 'required',
         ]);

         $input = $request->all();
         $input['password'] = Hash::make($input['password']);

         $slug = strtoupper(Str::slug($input['name'], '_'));
         $input['slug'] = $slug;

         $user = User::create($input);
         $role = Role::findById($request->input('role'));
         $user->assignRole($role);

         return redirect()->route('user.index')
                         ->with('success','User created successfully');
     }

     public function edit(Role $roles, $id)

     {
          $user = User::find($id);

          $roles = Role::pluck('name','name')->all();

        $userRole = $user->roles->pluck('name','name')->all();
          $branch = Branch::all();
        //  dd($roles);
         return view('Master.usermanagement.user.edit', compact('user','userRole','roles','branch'));
     }

     public function update(Request $request, $id)
     {
         $request->validate([

             'name'=>'required|regex:/^[A-Za-z ]+$/',
             'email' => 'required|email|unique:users,email,' . $id,
             'mobile'=>'required',
             'password' => 'required',
             'role' => 'required',
             'branch_id' => 'required',
             'isActive' => 'required',

          ]);

        $input = $request->all();
        if (!empty($input['password'])) {
           $input['password'] = Hash::make($input['password']);
        } else {
           $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('role'));

        if ($user) {
         return redirect()->route('user.index')
           ->with('success', 'User updated successfully');
     }

     return back()->with('failure', 'Please try again');


     }





     public function delete( $id)
     {
     
         $user = User::find($id);
         $user->delete();

         if ($user) {
             return redirect()->route('user.index')
               ->with('success', 'User deleted successfully');
         }

         return back()->with('failure', 'Please try again');



    }

}