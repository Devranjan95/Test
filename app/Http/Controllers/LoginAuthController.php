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


    public function checkLogin(Request $request){
    // $user = $request->input('username');
    // $password = $request->input('password');
    // $check = User::where('user_name', $user)->first();
    
    // if($check){
        
    //         $request->session()->put('loginId', $check->id);
    //         return redirect('dashboard');
        
    // } else {
    //     return back()->with('fail','This username is not registered.');
    // }       
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = $request->input('username');
        $password = $request->input('password');
        $check = User::where('user_name', $user)->first();
        
        if($check){
            if(Hash::check($password, $check->password)){
                $request->session()->put('loginId', $check->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Incorrect Credentials!! Please Check');
            }
        } else {
            return back()->with('fail', 'User Not Found Please Register The User');
        }       
}


    public function logout()
    {
        $data = array();
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect()->route('login');
        }
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
