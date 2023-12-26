<?php

namespace Database\Seeders;

use App\Models\bank_detail;
use App\Models\deposit;
use App\Models\PlatformDetails;
use App\Models\UserRegistration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRegisterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_registrations')->delete();
        DB::table('deposits')->delete();
        echo '---------------------------------------' . "\n";
        echo '--------User Seeding-------' . "\n";

        $datas = [
            [
                'branch_id' => 1,
                'name' => 'Ragul Aust',
                'mobile' => '7200801863',
                'lead_source_id' => 1,
                'location' => 'Cuddalore',
                'created_by' => 1,
                'updated_by' => 1
            ],

            [
                'branch_id' => 1,
                'name' => 'Kiran',
                'mobile' => '1234567890',
                'lead_source_id' => 1,
                'location' => 'Cuddalore',
                'created_by' => 1,
                'updated_by' => 1
            ],

            [
                'branch_id' => 1,
                'name' => 'Praveen',
                'mobile' => '9382938202',
                'lead_source_id' => 1,
                'location' => 'Pondicherry',
                'created_by' => 1,
                'updated_by' => 1
            ],

        ];


        foreach ($datas as $key => $value) {
            $data = new UserRegistration();
            $data->branch_id = $value['branch_id'];
            $data->name = $value['name'];
            $data->mobile = $value['mobile'];
            $data->lead_source_id = $value['lead_source_id'];
            $data->location = $value['location'];
            $data->created_by = $value['created_by'];
            $data->updated_by = $value['updated_by'];
            $data->save();
            echo "-------Roles Name=> $data->name --------------" . "\n";
        }

        $platform_details_datas = [
            [
                'player_id' => 1,
                'platform_id' => '1',
                'status' => 'InAcitve'
            ],
            [
                'player_id' => 2,
                'platform_id' => '1',
                'status' => 'InAcitve'
            ],
            [
                'player_id' => 3,
                'platform_id' => '1',
                'status' => 'InAcitve'
            ],



        ];


        foreach ($platform_details_datas as $key => $value) {
            $data = new PlatformDetails();
            $data->player_id = $value['player_id'];
            $data->platform_id = $value['platform_id'];
            $data->status = $value['status'];
            $data->save();
        }

        $deposit_details_datas = [
            [
                'platform_detail_id' => 1,
                'our_bank_detail_id' => 1,
                'utr' => 'QWE78451269522',
                'deposit_amount' => '5000',
                'bonus' => '0',
                'total_deposit_amount' => '5000',
                'admin_status' => 'Not Verified',
                'banker_status' => 'Pending',
                'status' => 'On Process',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'platform_detail_id' => 2,
                'our_bank_detail_id' => 1,
                'utr' => 'EROPS451269522',
                'deposit_amount' => '1000',
                'bonus' => '0',
                'total_deposit_amount' => '1000',
                'admin_status' => 'Not Verified',
                'banker_status' => 'Pending',
                'status' => 'On Process',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'platform_detail_id' => 3,
                'our_bank_detail_id' => 1,
                'utr' => 'SEIVE8451269522',
                'deposit_amount' => '3000',
                'bonus' => '0',
                'total_deposit_amount' => '3000',
                'admin_status' => 'Not Verified',
                'banker_status' => 'Pending',
                'status' => 'On Process',
                'created_by' => 1,
                'updated_by' => 1
            ],


        ];

        foreach ($deposit_details_datas as $key => $value) {
            $data = new deposit();
            $data->platform_detail_id = $value['platform_detail_id'];
            $data->our_bank_detail_id = $value['our_bank_detail_id'];
            $data->utr = $value['utr'];
            $data->deposit_amount = $value['deposit_amount'];
            $data->bonus = $value['bonus'];
            $data->total_deposit_amount = $value['total_deposit_amount'];
            $data->admin_status = $value['admin_status'];
            $data->banker_status = $value['banker_status'];
            $data->status = $value['status'];
            $data->created_by = $value['created_by'];
            $data->updated_by = $value['updated_by'];
            $data->save();
        }

        $bankDetails = [
            [
                'player_id' => 1,
                'account_name' => 'Ragul',
                'account_number' => 'AX29203ODSI2222',
                'ifsc_code' => 'AXIS0000123',
                'bank_name' => 'Axis Bank',
            ],
            [
                'player_id' => 2,
                'account_name' => 'Kiran',
                'account_number' => 'AX29203ODSI5554',
                'ifsc_code' => 'AXIS0000123',
                'bank_name' => 'Axis Bank',
            ],

        ];

        foreach ($bankDetails as $key => $value) {
            $data = new bank_detail();
            $data->player_id = $value['player_id'];
            $data->account_name = $value['account_name'];
            $data->account_number = $value['account_number'];
            $data->ifsc_code = $value['ifsc_code'];
            $data->bank_name = $value['bank_name'];
            $data->save();
        }
    }
}