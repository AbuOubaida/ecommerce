<?php

namespace Database\Seeders;

use App\Models\vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['name'=>'Oubaida', 'address'=>'Mirpur', 'city'=>'Dhaka','state'=>'Dhaka','country'=>'Bangladesh','pincode'=>'1200','mobile'=>'01778138129','email'=>'abuoubaida37@gmail.com','status'=>0],
        ];
        vendor::insert($vendorRecords);
    }
}
