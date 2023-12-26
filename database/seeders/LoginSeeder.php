<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        echo '---------------------------------------' . "\n";
        echo '--------User Seeding-------' . "\n";

        $datas = [
            [
                'name' => 'Sikander',
                'email' => 'sikander@sk',
                'slug' => Str::upper(Str::random(10)),
                'password' => Hash::make('Sk@123'),
                'mobile' => '1234567890',
                'branch_id' => 1,
            ],
            // [
            //     'name' => 'Sharan',
            //     'email' => 'Sharan@spx.com',
            //     'slug' => Str::upper(Str::random(10)),
            //     'password' => Hash::make('sharan@spx'),
            //     'mobile' => '1234567890',
            //     'branch_id' => 1,
            // ],
            // [
            //     'name' => 'Akon',
            //     'email' => 'akon@spx.com',
            //     'slug' => Str::upper(Str::random(10)),
            //     'password' => Hash::make('akon@spx'),
            //     'mobile' => '1234567890',
            //     'branch_id' => 1,
            // ],
            // [
            //     'name' => 'Kiran',
            //     'email' => 'kiran@spx.com',
            //     'slug' => Str::upper(Str::random(10)),
            //     'password' => Hash::make('kiran@spx'),
            //     'mobile' => '1234567890',
            //     'branch_id' => 1,
            // ],
        ];


        foreach ($datas as $key => $value) {
            $data = new User;
            $data->name = $value['name'];
            $data->email = $value['email'];
            $data->slug = $value['slug'];
            $data->password = $value['password'];
            $data->mobile = $value['mobile'];
            $data->branch_id = $value['branch_id'];
            $data->save();
            echo "-------Roles Name=> $data->name --------------" . "\n";
        }

        $user = User::all();
        $user[0]->assignRole('Super Admin');
        // $user[1]->assignRole('Admin');
        // $user[2]->assignRole('Banker');
        // $user[3]->assignRole('Customer Care');
    }
}