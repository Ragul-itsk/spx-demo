<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSource extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lead_sources')->delete();
        $states = array(
            array('name' => "No Source", 'code' => "NS"),
            array('name' => "Direct Call", 'code' => "DC"),
            array('name' => "Direct Walkin", 'code' => "DW"),
            array('name' => "DC+Walkin", 'code' => "CW"),
            array('name' => "Justdial", 'code' => "JD"),
            array('name' => "Justdail+Walkin", 'code' => "JW"),
            array('name' => "Website", 'code' => "WEB"),
            array('name' => "Advertisement", 'code' => "AD"),
            array('name' => "Website+Walkin", 'code' => "WW"),
            array('name' => "Sulekha", 'code' => "SK"),
            array('name' => "Online Enquiry", 'code' => "OE"),
            array('name' => "Urban Pro", 'code' => "UP"),
            array('name' => "Database Interested", 'code' => "DI"),
            array('name' => "Webinar", 'code' => "WB"),
            array('name' => "Google", 'code' => "Google"),
        );
        DB::table('lead_sources')->insert($states);
    }
}
