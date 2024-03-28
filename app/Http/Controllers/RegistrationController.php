<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\TestCategory;

use App\Models\TestSubCategory;

use App\Models\TestEntry;

use App\Models\Patient;

use App\Models\Token;

use App\Models\Counter;

use App\Models\PathoCount;

use App\Models\RadioCount;

use App\Models\OtherCount;
use App\Models\Narration;

class RegistrationController extends Controller
{
    // *********************TEST CATEGORY MASTER***********************************
    public function registraion(){
        
        $testcatname = TestCategory::where('status','!=','Deleted')->where('status','!=','Inactive')->pluck('test_category_name','id');
        return view('backend.registration',['testcatname'=>$testcatname]);
    }
// *************************************************************

    public function getSubcategory(Request $request){
        // print_r($request->all());exit;
        $testsubcategory = TestSubCategory::where('test_category','=',$request->testcategory)->where('status','=','Active')->pluck('test_subcategory_name','id');
        return response()->json(['testsubcategory'=>$testsubcategory]);
    }

// ******************************************************************
    public function getTestName(Request $request){
        //print_r($request->all());exit;
        $testname = TestEntry::where('test_subcategory','=',$request->testsubcat)->where('status','=','Active')->pluck('test_name','id');
        return response()->json(['testname'=>$testname]);
    }
// ****************************************************************************
    public function getTestPrice(Request $request)
    {
        // Add your logic to fetch the test price based on the selected testname
        $testname = $request->input('testname');

        // Perform database query or any other necessary operations to get the test price
        $testprice = TestEntry::where('id','=',$testname)->select('fprice')->get();
        // print_r($testprice);
        // exit;

        return response()->json(['testprice' => $testprice]);
    }
// *********************************************************************************

    private function generateRegnNo($regn_no){
        //$randno = rand(11,99);
        if($regn_no !=""){
            return $regn_no;
        }else{
            $count = Counter::select('counter')->get();
            //print_r($count);exit;
            foreach($count as $c){
                $upcount = ++$c->counter;
            }
            //print_r($upcount);exit;
            $formattedUpcount = sprintf('%04d', $upcount);
            $regn_no = "ORG-".time()."-".$formattedUpcount;
            $updatecount = Counter::where('id','=',1)->update(['counter'=>$upcount]);
            
        }
        return $regn_no;
        //print_r($regn_no);exit;
    }
// *****************************************************************************
    private function generateTokenNumber($pat_regno, $category,$testname) {
        //print_r($category);
        //exit;
        $date =  date('Y-m-d');
        
        if ($category == 1) {
            $testcatname = TestCategory::where('id','=',$category)->value('test_category_name');
            $testcat = strtoupper(substr($testcatname, 0, 5));
            $PCount = PathoCount::where('date',$date)->first();
            if(!is_null($PCount)){
                $pathologyCount = $PCount['pathology_count'];
                $upcount = $pathologyCount + 1;
                $formattedUpcount = sprintf('%02d', $upcount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = $PCount->update(['pathology_count' => $upcount]);
                
            }else{
                $pathologyCount = 1;
                $formattedUpcount = sprintf('%02d', $pathologyCount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = PathoCount::create(['pathology_count' => $pathologyCount,'date'=>$date]);
            }
            return $token;
            $testcatname = TestCategory::where('id','=',$category)->value('test_category_name');
            $testcat = strtoupper(substr($testcatname, 0, 5));
            if (!is_null($pathologyCount)) {
                $upcount = $pathologyCount + 1;
                $formattedUpcount = sprintf('%02d', $upcount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = PathoCount::where('id', 1)->update(['pathology_count' => $upcount,'date'=>Carbon::now()]);
            }else{
                $pathologyCount = 1;
                $formattedUpcount = sprintf('%02d', $pathologyCount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = PathoCount::where('id', 1)->update(['pathology_count' => $pathologyCount,'date'=>Carbon::now()]);
            }
            return $token;
        }else if($category == 2){
            $testcatname = TestCategory::where('id','=',$category)->value('test_category_name');
            $testcat = strtoupper(substr($testcatname, 0, 5));
            $RCount = RadioCount::where('date',$date)->first();
            if(!is_null($RCount)){
                $radiologyCount = $RCount['radiology_count'];
                $upcount = $radiologyCount + 1;
                $formattedUpcount = sprintf('%02d', $upcount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = $RCount->update(['radiology_count' => $upcount]);
                
            }else{
                $radiologyCount = 1;
                $formattedUpcount = sprintf('%02d', $radiologyCount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = RadioCount::create(['radiology_count' => $radiologyCount,'date'=>$date]);
            }
            return $token;
            $testcatname = TestCategory::where('id','=',$category)->value('test_category_name');
            $testcat = strtoupper(substr($testcatname, 0, 5));
            if (!is_null($radiologyCount)) {
                $upcount = $radiologyCount + 1;
                $formattedUpcount = sprintf('%02d', $upcount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = RadioCount::where('id', 1)->update(['radiology_count' => $upcount,'date'=>Carbon::now()]);
            }else{
                $radiologyCount = 1;
                $formattedUpcount = sprintf('%02d', $radiologyCount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = RadioCount::where('id', 1)->update(['radiology_count' => $radiologyCount,'date'=>Carbon::now()]);
                
            }
            return $token;
        }else{
            $testcatname = TestCategory::where('id','=',$category)->value('test_category_name');
            $testcat = strtoupper(substr($testcatname, 0, 5));
            $OCount = OtherCount::where('date',$date)->first();
            if(!is_null($OCount)){
                $otherCount = $OCount['other_count'];
                $upcount = $otherCount + 1;
                $formattedUpcount = sprintf('%02d', $upcount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = $OCount->update(['other_count' => $upcount]);
                
            }else{
                $otherCount = 1;
                $formattedUpcount = sprintf('%02d', $otherCount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = OtherCount::create(['other_count' => $otherCount,'date'=>$date]);
            }
            return $token;
            $testcatname = TestCategory::where('id','=',$category)->value('test_category_name');
            $testcat = strtoupper(substr($testcatname, 0, 5));
            if (!is_null($otherCount)) {
                $upcount = $otherCount + 1;
                $formattedUpcount = sprintf('%02d', $upcount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = OtherCount::where('id', 1)->update(['other_count' => $upcount,'date'=>Carbon::now()]);
            }else{
                $otherCount = 1;
                $formattedUpcount = sprintf('%02d', $otherCount);
                $token = $testcat.'-'.'TOKEN'.'-'.$formattedUpcount;
                $updatecount = OtherCount::where('id', 1)->update(['other_count' => $otherCount,'date'=>Carbon::now()]);
                
            }
            return $token;
            
        }
    }
    // ***********************************************************

    
    // ***********************************************************
    public function saveRegistration(Request $request){
        $regn_no ="";
        //print_r($request->regdno);exit;
        if($request->regdno == ""){
            $regn_no = $this->generateRegnNo($request->regdno); 
        }
        else{
            $regn_no = $request->regdno;
        }


        $patientinfo = Patient::where('pat_regno', '=', $regn_no)->select('pat_id', 'pat_regno', 'pat_name', 'total_visit', 'status', 'dob')->first();
        $save = null; // Initialize $save variable
        
        if ($patientinfo) {
            // Update existing patient information
            $update = Patient::where('pat_id', '=', $patientinfo->pat_id)->update([
                'total_visit' => $patientinfo->total_visit + 1,
                'updated_at' => now(),
                'dob' => $request->dob,
            ]);
        } else {
            // Create a new patient record
            $save = Patient::create([
                'pat_name' => ucwords($request->fname),
                'pat_regno' => $regn_no,
                'pat_phno' => $request->phone,
                'pat_email' => $request->email,
                'pat_gender' => $request->gender,
                'dob' => $request->dob,
                'pat_age' => $request->ageyr.'yrs '.$request->agemnth.'month '.$request->agedays.'days',
                'total_visit' => 1,
            ]);
        }
        $narration = Narration::create([
            'pat_regnno' => $regn_no,
            'narration' => $request->narration
            
        ]);
        
        // Create a new record in the Token table
        if ($save || (isset($update) && $update)) {
            $catnames = $request->catname;
            $subcats = $request->subcat;
            $testnames = $request->testname;
            $testprice = $request->testprice;
            $testdiscount = $request->discount;
            $testfprice = $request->finalprice;

            // print_r($testprice);
            // print_r($testdiscount);
            // print_r($testfprice);
            // exit;
        
            foreach ($catnames as $key => $catname) {

                $tokenNo = $this->generateTokenNumber($regn_no, $catname, $testnames);
                Token::create([
                    'pat_regno' => $regn_no,
                    'tok_no' => $tokenNo,
                    'test_category' => $catname,
                    'test_subcategory' => $subcats[$key],
                    'test_name' => $testnames[$key],
                    'test_charge' => $testprice[$key],
                    'discount' => $testdiscount[$key],
                    'final_price' => $testfprice[$key],
                    'date_of_testing' => now()->toDateString(),
                    'status' => 'Registration Completed',
                ]);
            }
            
            $patid = Patient::where('pat_regno',$regn_no)->value('pat_id');
            // print_r($regn_no.'---'.$patid);
            // exit;
            return response()->json(['Status' => true, 'message' => 'Registration Saved Successfully', 'registration' => $regn_no, 'patid'=>$patid]);
        } else {
            return response()->json(['Status' => false, 'message' => 'ERROR SAVING DATA']);
        }
        
    }

    public function showData(Request $request){
        //print_r($request->regn);exit;
        $patinfo = Patient::where('pat_regno','=',$request->regn)->orWhere('pat_email','=',$request->regn)
        ->orWhere('pat_phno','=',$request->regn)->first();
        if($patinfo){
            return response()->json(['patinfo'=>$patinfo]);
        }else{
            return response()->json(['status'=>false,'message'=>'Not Found']);
        }
    }


    




// **************************************************************************************
}