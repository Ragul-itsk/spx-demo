<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatForm extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plat_forms')->delete();
        $data = array(
            array('name' => "SILVER EXCH", 'code' => "SE", 'url' => 'https://sikanderplayx.com'),
        );
        DB::table('plat_forms')->insert($data);
    }
}
