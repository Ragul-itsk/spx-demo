<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\OurBankDetail;

class OurBankDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'bank_name' => 'RBL 1',
                'account_number' => '6645129630',
                'ifsc' => '',
                'remarks' => 'Example Remark 1',
                'status' => '0',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'bank_name' => 'RBL 2',
                'account_number' => '6645129780',
                'ifsc' => 'IFSC456',
                'remarks' => 'Example Remark 2',
                'status' => '0',
                'created_by' => 1,
                'updated_by' => 1,
            ],

        ];


        DB::table('our_bank_details')->insert($data);
    }
    }