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

class DashboardController extends Controller
{
    // public function __construct(){
    //     $this->middleware('authnew');
    // }
    public function index(){
       
            $currentDate = Carbon::now()->toDateString(); 

            $registeredCount = Token::where('status', 'Registration Completed')
                            ->where('date_of_testing', $currentDate)
                            ->count();

             $pendingCount = Token::where('status', 'Bill Pending')
                         ->where('date_of_testing', $currentDate)
                         ->count();

             $dispatchedCount = Token::where('status', 'Dispatched')
                            ->where('date_of_testing', $currentDate)
                            ->count();
            $sampleCollectionCount = Token::where('status', 'Sample Collection')
                                   ->where('date_of_testing', $currentDate)
                                   ->count();

            $tokinfo = Token::where('status','!=','Deleted')->where('date_of_testing','=',$currentDate)->get();
        
            $oinfo = [];
            foreach($tokinfo as $info){
                $patname = Patient::where('pat_regno','=',$info->pat_regno)->value('pat_name');
                $testcat = TestCategory::where('id','=',$info->test_category)->value('test_category_name');
                $testsubcat = TestSubcategory::where('id','=',$info->test_subcategory)->value('test_subcategory_name');
                $testname = TestEntry::where('id','=',$info->test_name)->value('test_name');

                // Append each set of information to the $oinfo array
                $oinfo[] = [
                    'patname' => $patname,
                    'category' => $testcat,
                    'subcat' => $testsubcat,
                    'test' => $testname
                ];
            }
            
            return view('backend.dashboard', [
                'tokinfo' => $tokinfo,
                'oinfo' => $oinfo,
                'registeredCount' => $registeredCount,
                'pendingCount' => $pendingCount,
                'dispatchedCount' => $dispatchedCount,
                'sampleCollectionCount' => $sampleCollectionCount,
            ]);
        }
       
    

 
    public function printregn($reg){
        // print_r($request->reg);
        // exit;
        $currentDate = Carbon::now()->toDateString();
        $patdetails = Patient::where('pat_regno',$reg)->first();
        $tokdetails = Token::where('pat_regno','=',$reg)->where('date_of_testing','=',$currentDate)->where('status','!=','Deleted')->get();
        //print_r($patdetails->pat_name);
        // print_r($tokdetails);
        $tinfo = [];
        foreach($tokdetails as $tok){
            $testcat = TestCategory::where('id','=',$tok->test_category)->value('test_category_name');
            $testsubcat = TestSubcategory::where('id','=',$tok->test_subcategory)->value('test_subcategory_name');
            $testname = TestEntry::where('id','=',$tok->test_name)->value('test_name');
            $tinfo[] = [
                'patname' => $patdetails->pat_name,
                'patregn' => $patdetails->pat_regno,
                'tprice' => $tok->test_charge,
                'discount'=>$tok->discount,
                'fprice' => $tok->final_price,
                'category' => $testcat,
                'subcat' => $testsubcat,
                'test' => $testname
            ];
        }
        // print_r($tinfo);
        // exit;
        return view('backend.printbackup', ['tokdetails' => $tokdetails, 'tinfo' => $tinfo,'patdetails'=>$patdetails]);
    }
}
