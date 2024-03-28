<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Token;
use App\Models\TestEntry;
use App\Models\TestSubCategory;
use App\Models\TestCategory;
use Illuminate\Support\Facades\Auth;


class PrintRegistrationController extends Controller
{
    public function PrintBill($patid){
        if(Auth::check()){
            // print_r($patid);
        // exit;
        $patdata = Patient::where('pat_id',$patid)->select('pat_regno','pat_name','pat_gender','pat_age')->first();
        // print_r($patdata->pat_name);
        // exit;
        $pattoken = Token::where('pat_regno',$patdata->pat_regno)->where('date_of_testing',now()->toDateString())->
                           where('status','!=','Deleted')->select('tok_no','test_name','test_charge','discount','final_price')->get();
        // print_r($pattoken);
        // exit;
        $patokeninfo = [];
        foreach($pattoken as $pat){
            $testname = TestEntry::where('id',$pat->test_name)->select('test_name','test_subcategory','test_category')->first();
            $testsubcat = TestSubCategory::where('id',$testname->test_subcategory)->select('test_subcategory_name')->first();
            $testcat = TestCategory::where('id',$testname->test_category)->select('test_category_name')->first();
            // print_r($testsubcat->test_subcategory_name);
            // print_r($testcat->test_category_name);
            // exit;
            $patokeninfo[] = [
                'tok_no' => $pat->tok_no,
                'test_category' => $testcat->test_category_name,
                'test_subcategory' => $testsubcat->test_subcategory_name,
                'test_name' => $testname->test_name,
                'test_charge' => $pat->test_charge,
                'discount' => $pat->discount,
                'final_price' => $pat->final_price
            ];
        }
        // print_r($patokeninfo);
        // exit;
        return view('backend.printbill',['patdata'=>$patdata,'patoken'=>$patokeninfo]);

        }
        
    }
// **************************************************************************************
    public function del(Request $request){
        // print_r($request->tokens);
        // exit;
        $currentDate = Carbon::now()->toDateString(); 
        $toks = $request->tokens;
        $tok = [];
        foreach($toks as $t){
            // print_r($t);
            $info = Token::where('pat_regno', $request->reg)
              ->where('tok_no', $t)
              ->whereDate('date_of_testing', $currentDate)
              ->value('tok_id');

              array_push($tok,$info);
              
        }
        // print_r($tok);
        // exit;
        foreach($tok as $toid){
            $update = Token::where('tok_id','=',$toid)->update(['status'=>'Deleted']);
        }
        if($update){
            return response()->json(['status'=>true,'message'=>'Selected Tokens Deleted Successfully']);
        }else{
            return response()->json(['status'=>false,'message'=>'Sorry No Records Found']);
        }
    }

    public function updateStatus(Request $request){
       
        // print_r($request->all());
        // exit;
        $currentDate = Carbon::now()->toDateString(); 
        $toks = $request->tokens;
        $tok = [];
        foreach($toks as $t){
            //  print_r($t);
            //  exit;
            $info = Token::where('pat_regno', $request->regnno)
              ->where('tok_no', $t)
              ->whereDate('date_of_testing', $currentDate)
              ->value('tok_id');

              array_push($tok,$info);
              
        }
        foreach($tok as $toid){
            $update = Token::where('tok_id','=',$toid)->update(['status'=>'Bill Pending']);
        }
        if($update){
            return response()->json(['status'=>true,'message'=>'Selected Tokens Are On HOLD']);
        }else{
            return response()->json(['status'=>false,'message'=>'Sorry No Records Found']);
        }
        
    }

    public function updateStatuspending(Request $request){
       
        // print_r($request->all());
        // exit;
        $currentDate = Carbon::now()->toDateString(); 
        $toks = $request->tokens;
        $tok = [];
        foreach($toks as $t){
            //  print_r($t);
            //  exit;
            $info = Token::where('pat_regno', $request->regnno)
              ->where('tok_no', $t)
              ->whereDate('date_of_testing', $currentDate)
              ->value('tok_id');

              array_push($tok,$info);
              
        }
        foreach($tok as $toid){
            $update = Token::where('tok_id','=',$toid)->update(['status'=>'Registration Completed']);
        }
        if($update){
            return response()->json(['status'=>true,'message'=>'Selected Tokens Are Registerd Successfully']);
        }else{
            return response()->json(['status'=>false,'message'=>'Sorry No Records Found']);
        }
        
    }

}