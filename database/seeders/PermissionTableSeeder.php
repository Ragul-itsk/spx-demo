<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionGroup;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            // Dashboard
            [
                'name' => 'Dashboard',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            [
                'name' => 'Total User',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            [
                'name' => 'Total Deposit',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            [
                'name' => 'Total Withdraw',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            [
                'name' => 'Net',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            [
                'name' => 'Recent User',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            [
                'name' => 'Recent Deposit',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            [
                'name' => 'Recent Withdraw',
                'permission_group_id' => PermissionGroup::where('name', 'Dashboard')->first()->id
            ],
            // User
            [
                'name' => 'User',
                'permission_group_id' => PermissionGroup::where('name', 'User')->first()->id
            ],
            [
                'name' => 'All User',
                'permission_group_id' => PermissionGroup::where('name', 'User')->first()->id
            ],
            [
                'name' => 'Upload Player',
                'permission_group_id' => PermissionGroup::where('name', 'User')->first()->id
            ],
            [
                'name' => 'User Show',
                'permission_group_id' => PermissionGroup::where('name', 'All User')->first()->id
            ],
            [
                'name' => 'User Add',
                'permission_group_id' => PermissionGroup::where('name', 'All User')->first()->id
            ],
            [
                'name' => 'User Edit',
                'permission_group_id' => PermissionGroup::where('name', 'All User')->first()->id
            ],
            [
                'name' => 'User Delete',
                'permission_group_id' => PermissionGroup::where('name', 'All User')->first()->id
            ],
            [
                'name' => 'User Info',
                'permission_group_id' => PermissionGroup::where('name', 'All User')->first()->id
            ],
            [
                'name' => 'User Bankdetails',
                'permission_group_id' => PermissionGroup::where('name', 'All User')->first()->id
            ],
            [
                'name' => 'User Feedback',
                'permission_group_id' => PermissionGroup::where('name', 'All User')->first()->id
            ],
            //Payments
            [
                'name' => 'Payments',
                'permission_group_id' => PermissionGroup::where('name', 'Payments')->first()->id
            ],
            [
                'name' => 'All Payment',
                'permission_group_id' => PermissionGroup::where('name', 'Payments')->first()->id
            ],
            [
                'name' => 'All Deposit',
                'permission_group_id' => PermissionGroup::where('name', 'Payments')->first()->id
            ],
            [
                'name' => 'All Withdraw',
                'permission_group_id' => PermissionGroup::where('name', 'Payments')->first()->id
            ],
            [
                'name' => 'Payment Show',
                'permission_group_id' => PermissionGroup::where('name', 'All Payment')->first()->id
            ],
            [
                'name' => 'Deposit Show',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Add',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Edit',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Delete',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Info',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Bankdetails',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Feedback',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Admin Enable',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Deposit Banker Enable',
                'permission_group_id' => PermissionGroup::where('name', 'All Deposit')->first()->id
            ],
            [
                'name' => 'Withdraw Show',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Add',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Edit',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Delete',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Info',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Bankdetails',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Feedback',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Admin Enable',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            [
                'name' => 'Withdraw Banker Enable',
                'permission_group_id' => PermissionGroup::where('name', 'All Withdraw')->first()->id
            ],
            //Report
            [
                'name' => 'Report',
                'permission_group_id' => PermissionGroup::where('name', 'Reports')->first()->id
            ],
            [
                'name' => 'User Report',
                'permission_group_id' => PermissionGroup::where('name', 'Reports')->first()->id
            ],
            [
                'name' => 'Payment Report',
                'permission_group_id' => PermissionGroup::where('name', 'Reports')->first()->id
            ],
            [
                'name' => 'User Report Show',
                'permission_group_id' => PermissionGroup::where('name', 'User Reports')->first()->id
            ],
            [
                'name' => 'Payment Report Show',
                'permission_group_id' => PermissionGroup::where('name', 'Payment Reports')->first()->id
            ],

            // setup

            [
                'name' => 'Setups',
                'permission_group_id' => PermissionGroup::where('name', 'Setup')->first()->id
            ],

            [
                'name' => 'Generals',
                'permission_group_id' => PermissionGroup::where('name', 'Setup')->first()->id
            ],
            [
                'name' => 'User And Control',
                'permission_group_id' => PermissionGroup::where('name', 'Setup')->first()->id
            ],
            [
                'name' => 'Lead Setting',
                'permission_group_id' => PermissionGroup::where('name', 'Setup')->first()->id
            ],
            // // setup  General

            [
                'name' => 'Branch',
                'permission_group_id' => PermissionGroup::where('name', 'General')->first()->id
            ],

            [
                'name' => 'Branchs Add',
                'permission_group_id' => PermissionGroup::where('name', 'Branch')->first()->id
            ],
            [
                'name' => 'Branchs Show',
                'permission_group_id' => PermissionGroup::where('name', 'Branch')->first()->id
            ],
            [
                'name' => 'Branchs Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Branch')->first()->id
            ],
            [
                'name' => 'Branchs Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Branch')->first()->id
            ],

            // // setup user and control

            [
                'name' => 'Users',
                'permission_group_id' => PermissionGroup::where('name', 'User And Control')->first()->id
            ],
            [
                'name' => 'Role',
                'permission_group_id' => PermissionGroup::where('name', 'User And Control')->first()->id
            ],
            [
                'name' => 'Permission',
                'permission_group_id' => PermissionGroup::where('name', 'User And Control')->first()->id
            ],


            [
                'name' => 'Users Show',
                'permission_group_id' => PermissionGroup::where('name', 'Users')->first()->id
            ],
            [
                'name' => 'Users Add',
                'permission_group_id' => PermissionGroup::where('name', 'Users')->first()->id
            ],
            [
                'name' => 'Users Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Users')->first()->id
            ],
            [
                'name' => 'Users Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Users')->first()->id
            ],
            //Role
            [
                'name' => 'Role Show',
                'permission_group_id' => PermissionGroup::where('name', 'Roles')->first()->id
            ],
            [
                'name' => 'Role Add',
                'permission_group_id' => PermissionGroup::where('name', 'Roles')->first()->id
            ],
            [
                'name' => 'Role Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Roles')->first()->id
            ],
            [
                'name' => 'Role Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Roles')->first()->id
            ],

            [
                'name' => 'Permission Show',
                'permission_group_id' => PermissionGroup::where('name', 'Permissions')->first()->id
            ],
            [
                'name' => 'Permission Add',
                'permission_group_id' => PermissionGroup::where('name', 'Permissions')->first()->id
            ],
            [
                'name' => 'Permission Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Permissions')->first()->id
            ],
            [
                'name' => 'Permission Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Permissions')->first()->id
            ],

            // // Setup lead setting

            [
                'name' => 'Leadsource',
                'permission_group_id' => PermissionGroup::where('name', 'Lead Setting')->first()->id
            ],
            [
                'name' => 'Platform',
                'permission_group_id' => PermissionGroup::where('name', 'Lead Setting')->first()->id
            ],

            [
                'name' => 'Lead Show',
                'permission_group_id' => PermissionGroup::where('name', 'Lead Source')->first()->id
            ],
            [
                'name' => 'Lead Add',
                'permission_group_id' => PermissionGroup::where('name', 'Lead Source')->first()->id
            ],
            [
                'name' => 'Lead Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Lead Source')->first()->id
            ],
            [
                'name' => 'Lead Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Lead Source')->first()->id
            ],

            [
                'name' => 'Platform Show',
                'permission_group_id' => PermissionGroup::where('name', 'Platform')->first()->id
            ],
            [
                'name' => 'Platform Add',
                'permission_group_id' => PermissionGroup::where('name', 'Platform')->first()->id
            ],
            [
                'name' => 'Platform Edit',
                'permission_group_id' => PermissionGroup::where('name', 'Platform')->first()->id
            ],
            [
                'name' => 'Platform Delete',
                'permission_group_id' => PermissionGroup::where('name', 'Platform')->first()->id
            ],
            //Icon
            [
                'name' => 'Users Icon',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],

            [
                'name' => 'Deposit Icon',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],

            [
                'name' => 'Withdraw Icon',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],
            [
                'name' => 'Add Player Bank',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],
            [
                'name' => 'Pending Deposit',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],
            [
                'name' => 'Pending Withdraw',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],
            [
                'name' => 'CC DPending',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],
            [
                'name' => 'CC WPending',
                'permission_group_id' => PermissionGroup::where('name', 'Main Icon')->first()->id
            ],

        ];

        echo '---------------------------------------' . "\n";
        echo '--------Permission Seeding-------' . "\n";

        foreach ($permission as $key => $value) {
            $permission = new Permission;
            $permission->name = $value['name'];
            $permission->permission_group_id = $value['permission_group_id'];
            $permission->save();
            echo "-------Permission Name=> $permission->name--------------" . "\n";
        }
        echo "-------Permission Seeding Completed--------------" . "\n";
    }
}
