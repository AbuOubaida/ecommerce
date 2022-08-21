<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
//Group for admin
Route::prefix('admin/')->group(function (){
    //Group for AdminController::class
    Route::controller(AdminController::class)->group(function (){
        //Admin Login Route without admin group
        Route::match(['get','post'],'login','login');

        // For admin role
        // modified by abu Oubaida(Dev) for admin middleware
        // step-1 to step-8
        // Create admin middleware please flow auth.php step-1 (config/auth.php)
        // step-8: from (app/Http/Middleware/Admin.php)
        Route::group(['middleware'=>['admin']],function(){
            //Admin dashboard Route without admin group
            Route::get('dashboard','dashboard');
        });

    });
});

