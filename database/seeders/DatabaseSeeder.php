<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ################################################
        // For create super admin default data from seeder
        // From (routs/web.php)
        // step-5:
        $this->call(AdminTableSeeder::class);
        // step-6: Go back to Terminal and write command `composer dump-autoload`
        // step-7: write command `php artisan db:seed`
        // step-8: check database super admin create successfully
        // step-9: exit

        // \App\Models\User::factory(10)->create();

        ########################
//        Add vendor data
        $this->call(VendorsTableSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
