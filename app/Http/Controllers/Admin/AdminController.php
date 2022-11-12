<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Rules\Html;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\True_;

//use App\Models\admin;

class AdminController extends Controller
{
    private $html = null;
    private $adminProfilePath = 'admin/images/uploaded/profile/';
    public function __construct()
    {
        $this->html = new Html;
    }
    public function show()
    {

    }
    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $rules = [
                'oldPass' => ['required',$this->html],
                'newPass' => ['required','min:6',$this->html],
                'conPass' => ['required','min:6','same:newPass',$this->html]
            ];
            $message = [
                'oldPass.required' => 'Current password is required.',
                'newPass.required' => 'New password is required.',
                'newPass.min' => 'The new password must be at least 6 characters.',
                'conPass.required' => 'Conform password is required.',
                'conPass.min' => 'The conform password must be at least 6 characters.',
                'conPass.same'     => "New Password and conform password doesn't match."
            ];
            $this->validate($request,$rules,$message);
            try {
                extract($request->post());
                if (Hash::check($oldPass,Auth::guard('admin')->user()->password))
                {
                    \App\Models\admin::where('id',Auth::guard('admin')->user()->id)->update([
                        'password' => Hash::make($newPass)
                    ]);
                    return back()->with('success','Password update successfully.');
                }else{
                    return back()->with('error',"Current password doesn't match.");
                }
            }catch (\Throwable $exception)
            {
                return back()->with('error',$exception->getMessage())->withInput();
            }
        }
        $adminDetails = \App\Models\admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.settings.update_admin_password',compact('adminDetails'));
    }
    public function checkCurrentPassword(Request $request)
    {
        extract($request->post());
        if (Hash::check($v,Auth::guard('admin')->user()->password))
        {
            return 'true';
        }
        else{
            return 'false';
        }
    }
    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $rules = [
                'name'    => ['required','regex:/^[\pL\s\-]+$/u',$this->html],
                'mobile'  => ['required','min:10','max:14','regex:/(0)[0-9]/', $this->html],
                'profile' => ['mimes:jpeg,jpg,png,gif','sometimes','nullable','max:1024']
            ];
            $message = [
                'name.required'     => "Name is required.",
                'name.regex'        => "Valid Name is required",
                'mobile.required'   => "Mobile number is required.",
                'mobile.min'        => "Mobile number will be minimum 10 digit.",
                'mobile.max'        => "Mobile number will be maximum 14 digit.",
                'mobile.numeric'    => "Mobile number must be numeric.",
                'mobile.regex'      => "Mobile number must be numeric.",
                'profile.mimes'     => "Profile image type must be .pjeg, .jpg, .png, .gif.",
                'profile.max'       => "Profile image size must be <= 1MB",
            ];
            $this->validate($request,$rules,$message);
            try {
                extract($request->post());
                $img_name = Auth::guard('admin')->user()->image;
                if ($request->hasFile('profile'))
                {
                    extract($request->file());
                    if (@$profile)
                    {
                        $ext = $profile->getClientOriginalExtension();
                        $img_name = str_replace(' ','_',$name).'_'.rand(111,99999).'_'.$profile->getClientOriginalName();
                        $imageUploadPath = $this->adminProfilePath.$img_name;

                        Image::make($profile)->save($imageUploadPath);
                    }
                }
                \App\Models\admin::where('id',Auth::guard('admin')->user()->id)->update(
                    [
                        'name'   =>  $name,
                        'mobile' =>  $mobile,
                        'image'  =>  $img_name
                    ]);
                return back()->with("success","Data update successfully");
            }catch (\Throwable $exception)
            {
                return back()->with('error',$exception->getMessage());
            }
        }else{
            try {
                $adminData = \App\Models\admin::where('email',Auth::guard('admin')->user()->email)->first();
                return \view("admin.settings.update_admin_details",compact('adminData'));
            }catch (\Throwable $exception)
            {
                return back()->with('error',$exception->getMessage());
            }
        }
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
    //Update vendor details
    public function updateVendorDetails(Request $request,$slug)
    {
       if( strtolower($slug) == 'personal')
       {

       }elseif (strtolower($slug) == 'business')
       {

       }elseif (strtolower($slug) == 'bank')
       {

       }else{
           return back();
       }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
