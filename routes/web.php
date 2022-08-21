<?php
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
# Route 1.0 Admin Role
//==========Start Group for admin ==============
Route::prefix('admin/')->group(function (){
    // Optional Roure
    Route::get('/',function (){
        return redirect()->route('admin.dashboard');
    });
    //Group for AdminController
    Route::resource('admin',AdminController::class);
    Route::controller(AdminController::class)->group(function (){
        //Admin Login Route without admin group
        Route::match(['get','post'],'login','login');

        ################
        // For admin role
        // modified by Abu Oubaida(Dev) for admin middleware
        // Flow step-1 to step-9
        // Create admin middleware please flow auth.php step-1 (config/auth.php)
        // step-8: from (app/Http/Middleware/Admin.php)
        Route::group(['middleware'=>['admin']],function(){
            /***********************
            //=========Start create super admin default data ==============
            //For create super admin default data from seeder
            // Flow step-1 to (step-9 in database/seeders/AdminTableSeeder.php)
            //step-1: create AdminTableSeeder (php artisan make:seeder AdminTableSeeder)
            //step-2: Go to database/seeders/AdminTableSeeder.php
            //-->
            *****************************/
            //============End create super admin default data==============

            //Admin dashboard Route without admin group
            Route::get('dashboard','dashboard')->name('admin.dashboard');
        });//=======End admin role=======
        // step-9: exit


    });//End Group for AdminController

});//==========End Group for admin ==============
#============1.0 End ============================

