<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if(Auth::check()){
            $users = User::where('status','!=','Deleted')->get();
        $screens = [
            1 => 'Registration',
            2 => 'Dashboard',
            3 => 'Sample Collection',
            4 => 'Result Entry',
            5 => 'Report Dispatch',
            6 => 'Manage User',
            7 => 'User Reports',
            8 => 'Masters',
        ];
        // print_r($users);
       
        // foreach($users as $use){
        //     print_r($use->name);
        // }
        // exit;
        return view('backend.user',['users'=>$users,'screens'=>$screens]);
        }
        
    }


    public function saveUser(Request $request){
        
        if($request->mode == 'add'){
            $saveuser = User::create([
                'name'=>ucwords($request->name),
                'user_name'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->pwd),
                'department'=>$request->dept,
                'qualification'=>$request->qualification,
                'role'=>$request->role,
                'screens'=>implode(',', $request->screen_access),
                'status'=>$request->status 
            ]);
            if($saveuser){
                return response()->json(['status'=>true,'message'=>'User Registered Successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'User Not Registered ']);
            }
        }

        if($request->mode == 'edit'){
            $updateuser = User::where('id','=',$request->recordid)->update([
                'name'=>ucwords($request->name),
                'user_name'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->pwd),
                'department'=>$request->dept,
                'qualification'=>$request->qualification,
                'role'=>$request->role,
                'screens'=>implode(',', $request->screen_access),
                'status'=>$request->status 
            ]);
            if($updateuser){
                return response()->json(['status'=>true,'message'=>'User Updated Successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'User Not Updated ']);
            }
        }
    }
    public function getUser(string $id)
    {
        $user = User::where('id', $id)->first();
        // print_r($user);
        // exit;
        return response()->json([$user]);
    }

    public function deleteUser(string $id)
    {

        $delete = User::where('id','=',$id)->delete();
        

            if($delete){
                return response()->json([
                    'status' => true,
                    'message' => 'User deleted Successfully',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "User could not be deleted.",
                ]);
            }
    }

   

}
