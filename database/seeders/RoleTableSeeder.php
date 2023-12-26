<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();
        echo '---------------------------------------' . "\n";
        echo '--------Role Seeding-------' . "\n";

        $roles = [
            [
                'name' => 'Super Admin'
            ],
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Customer Care'
            ],
            [
                'name' => 'Banker'
            ],
        ];


        foreach ($roles as $key => $value) {
            $role = new Role();
            $role->name = $value['name'];
            $role->save();
            echo "-------Roles Name=> $role->name--------------" . "\n";
        }

        $super_admin = Role::all();

        $permission = Permission::get();
        foreach ($permission as $key => $value) {
            $super_admin[0]->givePermissionTo($value->name);
            $super_admin[2]->givePermissionTo($value->name);
        }

        echo "------------- All Permission to => Super Admin -----------" . "\n";

        $permissionsToBanker = ['Payments', 'All Deposit', 'All Withdraw', 'Payment Show', 'Deposit Show', 'Deposit Banker Enable', 'Withdraw Show', 'Withdraw Banker Enable', 'Pending Deposit', 'Pending Withdraw'];

        $Banker = Role::where('name', 'Banker')->first();

        foreach ($permissionsToBanker as $permissionName) {
            $permission = Permission::where('name', $permissionName)->first();

            if ($permission) {
                $Banker->givePermissionTo($permission);
            } else {
                // Handle the case where the permission with the specified name is not found.
            }
        }

        echo "------------- All Permission to => Banker -----------" . "\n";

        $permissionsToAdmin = ['Payments', 'All Deposit', 'All Withdraw', 'Withdraw Show', 'Payment Show', 'Deposit Show', 'Deposit Admin Enable', 'Withdraw Admin Enable', 'Pending Deposit', 'Pending Withdraw'];

        $Admin = Role::where('name', 'Admin')->first();

        foreach ($permissionsToAdmin as $permissionName) {
            $permission = Permission::where('name', $permissionName)->first();

            if ($permission) {
                $Admin->givePermissionTo($permission);
            } else {
                // Handle the case where the permission with the specified name is not found.
            }
        }

        echo "------------- All Permission to => Banker -----------" . "\n";
    }
}
