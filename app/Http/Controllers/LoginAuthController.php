<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginAuthController extends Controller
{

    public function index(){
        return view('backend.login');
    }


    public function checkLogin(Request $request)
    {
        $user = $request->username;
        $password = $request->password;
        $check = User::where('user_name', $user)->first();
        // print($check->id);
        // exit;
        
        
        if ($check && Hash::check($password, $check->password)) {
            return redirect()->route('dashboard')->with('success', 'Login Successful');
        } else {
            Session::flash('error', 'Wrong Username Or Password. Please check and try again.');
            return redirect()->back();
        }
    }


    public function logout()
    {
        Auth::logout(); // Log out the user
        Session::flash('success', 'Logged out successfully.');
        return redirect()->route('login');
    }

    // public function checkLogin(Request $request){
    //     $user=$request->username;
    //     $password=$request->password;
    //     $check = User::where('user_name',$user)->first();
    //     if ($user && Hash::check($password, $check->password)) {
    //     // Redirect to dashboard or any desired route
        
    //     return redirect()->route('dashboard')->with('success', 'Login Successful');

    //         // Session::flash('success', 'Login Successful');
    //         // return redirect()->route('dashboard'); 

    //     } else {
    //         Session::flash('error', 'Wrong Username Or Password. Please check and try again.');
    //         return redirect()->back();
            
    //     }
     
    // }


   

}
