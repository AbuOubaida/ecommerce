<?php

namespace Database\Seeders;

use App\Models\vendors_business_details;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorsBusinessDetails = [
            ['vendor_id'=>1, 'shop_name'=>'Rimjhim Food', 'shop_address'=>'Mirpur-1', 'shop_city'=>'Dhaka', 'shop_country'=>'Bangladesh', 'shop_pincode'=>'123', 'shop_mobile'=>'01778138129',],
        ];
        vendors_business_details::insert($vendorsBusinessDetails);
    }
}
