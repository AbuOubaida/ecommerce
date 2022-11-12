<?php

namespace Database\Seeders;

use App\Models\vendors_bank_details;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorsBankDetailsRecord = [
            ['vendor_id'=>1, 'account_holder_name'=>'Rimjhim Food', 'bank_name'=>'City Bank', 'account_number'=>'221039264740',],
        ];
        vendors_bank_details::insert($vendorsBankDetailsRecord);
    }
}
