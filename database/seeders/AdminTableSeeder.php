<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //For create super admin default data from seeder
        //step-3:
        $adminRecords = [
            [
//                'id'        =>  1,
                'name'      =>  'Super Admin',
                'type'      =>  'superadmin',
                'vendor_id' =>  0,
                'mobile'    =>  '01778138129',
                'email'     =>  'admin@hiework.com',
                'password'  =>  Hash::make('12345678'),
                'status'    =>  1,
            ],
        ];

        admin::insert($adminRecords);
        // step-4: Go to database/seeders/DatabaseSeeder.php

        $vendorRecords = [
            [
                'name'      =>  'Oubaida',
                'type'      =>  'vendor',
                'vendor_id' =>  1,
                'mobile'    =>  '01778138129',
                'email'     =>  'abuoubaida37@gmail.com',
                'password'  =>  Hash::make('12345678'),
                'status'    =>  0,
            ],
        ];
//        admin::insert($vendorRecords);
    }
}
