<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Models\admin;

class AdminController extends Controller
{
    public function show()
    {

    }
    public function updateAdminPassword(): Factory|View|Application
    {
        $adminDetails = \App\Models\admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.settings.update_admin_password',compact('adminDetails'));
    }
    //
    public function dashboard(): Factory|View|Application
    {
        return view('admin.dashboard');
    }
    // For admin login page view
    public function login(Request $request): View|Factory|RedirectResponse|Application
    {
        if ($request->isMethod('post'))
        {
            $rules = [
                'email'     =>  'required|email|max:255',
                'password'  =>  'required',
            ];
            $messages = [
                'email.required'    =>  'Email address is required',
                'email.email'       =>  'Valid email address is required',
                'email.max'         =>  'Email length maximum is 255',
                'password.required' =>  'Password is required',
            ];
            $this->validate($request,$rules,$messages);
            try {
                extract($request->post());
                if (Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password,'status'=>1]))
                {
                    return redirect()->route('admin.dashboard');
                }
                else{
                    return back()->with('error','Invalid Email or Password')->withInput();
                }

            }catch (\Throwable $exception)
            {
                return back()->withInput()->with('error',$exception->getMessage());
            }
        }
        return view('admin.login');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
