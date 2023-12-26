<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;


class PermissionGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionGroup = [
            [
                'name' => 'Dashboard'
            ],
            [
                'name' => 'User'
            ],
            [
                'name' => 'All User'
            ],

            [
                'name'  => 'Payments'
            ],
             [
                'name'  => 'All Payment'
            ],
            [
                'name'  => 'All Deposit'
            ],
            [
                'name'  => 'All Withdraw'
            ],
            [
                'name' => 'Reports'
            ],
            [
                'name' => 'User Reports'
            ],
            [
                'name' => 'Payment Reports'
            ],

            [
                'name'  => 'Setup'
            ],
            [
                'name'  => 'General'
            ],
            [
                'name'  => 'Branch'
            ],
            [
                'name'  => 'User And Control'
            ],
            [
                'name'  => 'Users'
            ],
            [
                'name'  => 'Roles'
            ],
            [
                'name'  => 'Permissions'
            ],
            [
                'name'  => 'Lead Setting'
            ],
            [
                'name'  => 'Lead Source'
            ],
            [
                'name'  => 'Platform'
            ],
            [
                'name'  => 'Main Icon'
            ],
            

        ];

        echo '---------------------------------------' . "\n";
        echo '--------Permission Group Seeding-------' . "\n";

        foreach ($permissionGroup as $key => $value) {
            $permissionGroup = new PermissionGroup;
            $permissionGroup->name = $value['name'];
            $permissionGroup->save();
            echo "-------Permission Group Name=> $permissionGroup->name--------------" . "\n";
        }
        echo "-------Permission Group Seeding Completed--------------" . "\n";
    }
    }