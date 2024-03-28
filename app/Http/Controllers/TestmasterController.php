<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\TestCategory;

use App\Models\TestSubCategory;

use App\Models\TestEntry;

class TestmasterController extends Controller
{
    // *********************TEST CATEGORY MASTER***********************************
    public function testCategory(){
        return view('backend.testCategory');
    }

    public function saveCategory(Request $request){
        // print_r($request->all());
        // exit;

        if($request->mode == 'add'){

            $existingCategory = TestCategory::where('test_category_name', ucwords($request->testcatname))
            ->orWhere('test_category_code', $request->testcatcode) ->first();
            if($existingCategory){
                if($existingCategory->status == 'Deleted'){
                    $update = TestCategory::where('test_category_name', ucwords($request->testcatname))
                    ->orWhere('test_category_code', $request->testcatcode)->update([
                        'test_category_name'=>ucwords($request->testcatname),
                        'test_category_code'=>$request->testcatcode,
                        'status'=>'Active',
                        'updated_at'=>date("Y-m-d H:i:s")
                    ]);
    
                    if($update){
                        return response()->json(['status' => false, 'message' => "Test Category Saved Successfully"]);
                    }
                    
                }else{
                    return response()->json(['status' => false, 'message' => "ERROR!! Test Category Name Or Code already exist"]);
                }
            }
              
            $savecategory = TestCategory::create([
                'test_category_name'=>ucwords($request->testcatname),
                'test_category_code'=>$request->testcatcode,
                'status'=>$request->status 
            ]);
            // print_r($savecategory);
            // exit;
            if($savecategory){
                return response()->json(["Status"=>true,"message"=>"Test Category Saved Successfully"]);
            }else{
                return response()->json(['status' => false, 'message' => "Test Category could not be Saved"]);
            }
             
        }

        if($request->mode == 'edit'){
            
            // ******************************TEST CODE*************************

                $exists = TestCategory::where('status','!=','Deleted')->where('test_category_name', ucwords($request->testcatname))->orWhere(
                    'test_category_code', $request->testcatcode)->get();
                // $exists = TestCategory::where(function ($query) use ($request) {
                //     $query->where('status', '!=', 'Deleted')
                //           ->where(function ($query) use ($request) {
                //               $query->where('test_category_name', ucwords($request->testcatname))
                //                     ->orWhere('test_category_code', $request->testcatcode);
                //           });
                // })->get();
                    // print_r($exists);
                    // exit;
                if($exists){
                    foreach($exists as $ex){
                        if($request->recordid != $ex->id){
                            return response()->json(['status' => false, 'message' => "ERROR!! Test Category Name Or Code already exist"]);
                        }else{
                            
                        }
                    }
                }
                $updatecategory = TestCategory::where('id', $request->recordid)->update([
                    'test_category_name' => ucwords($request->testcatname),
                    'test_category_code' => $request->testcatcode,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'status' => $request->status
                ]);
                return response()->json(["Status"=>true,"message"=>"Test Category Updated Successfully"]);

                // $existcatName = TestCategory::where('test_category_name', ucwords($request->testcatname))->first();
                // $existcatCode = TestCategory::where('test_category_code', $request->testcatcode)->first();

                // if ($existcatName && $existcatCode) {
                //     // Both name and code already exist, do not update
                //     return response()->json(['status' => false, 'message' => "ERROR!! Test Category Name Or Code already exist"]);
                // } elseif ($existcatName) {
                //     // Only name exists, update code only
                //     $updatecategory = TestCategory::where('id', $request->recordid)->update([
                //         'test_category_code' => $request->testcatcode,
                //         'updated_at' => date("Y-m-d H:i:s"),
                //         'status' => $request->status
                //     ]);
                //     return response()->json(["Status"=>true,"message"=>"Test Category Code Updated Successfully"]);
                // } elseif ($existcatCode) {
                //     // Only code exists, update name only
                //     $updatecategory = TestCategory::where('id', $request->recordid)->update([
                //         'test_category_name' => ucwords($request->testcatname),
                //         'updated_at' => date("Y-m-d H:i:s"),
                //         'status' => $request->status
                //     ]);
                //     return response()->json(["Status"=>true,"message"=>"Test Category Name Updated Successfully"]);
                // } else {
                //     // Both name and code are new, update both
                //     $updatecategory = TestCategory::where('id', $request->recordid)->update([
                //         'test_category_name' => ucwords($request->testcatname),
                //         'test_category_code' => $request->testcatcode,
                //         'updated_at' => date("Y-m-d H:i:s"),
                //         'status' => $request->status
                //     ]);
                //     return response()->json(["Status"=>true,"message"=>"Test Category Updated Successfully"]);
                // }
            // ****************************************************************

        }

        



    }

    public function getDataCategory(string $id)
    {
        $testcategory = TestCategory::where('id', $id)->first();
        return response()->json([$testcategory]);
    }

    public function showCategory(){
        $categorylist = TestCategory::where('status', '!=' , 'Deleted')->select('id','test_category_name','test_category_code','status')->get();
        // print_r($categorylist);
        // exit;

        $sl = 1;

        return view('backend.testCategory', ['categorylist' => $categorylist, 'sl' => $sl]);
    }



    public function deleteDataCategory(string $id)
    {
        // $save = TestCategory::where('id','=',$id)
        //     ->update([
        //         'updated_at'  => date('Y-m-d H:i:s'),
        //         'status'      => 'Deleted'
        //     ]);

        $save = TestCategory::where('id','=',$id)->delete();
        

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Test Category deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Test Category could not be deleted.",
                ]);
            }
    }
    // *************************END TEST-CATEGORY MASTER**************************************

    // **************************TEST SUB-CATEGORY MASTER*************************************
        public function testSubCategory(){
            return view('backend.testsubCategory');
        }
        
        public function getTestCategory(){
            $testCategory = TestCategory::where('status', '!=','Inactive')->pluck('test_category_name','id');
            $subCategoryList = TestSubCategory::where('status','!=','Deleted')->select(
                'id','test_subcategory_name','test_category','test_subcategory_code','status')->get();

            $l=[];
            foreach ($subCategoryList as $sub){
                $testcatname = TestCategory::where('id','=',$sub->test_category)->select('test_category_name')->get();
                //print_r($testcatname);
                foreach($testcatname as $test){
                    array_push($l,$test->test_category_name);
                }

            }
        
            $sl=1;
            //print_r($testCategory);exit;
            return view('backend.testsubCategory',['testCategory'=>$testCategory,'subCategoryList'=>$subCategoryList,'sl'=>$sl,'l'=>$l]);
        }


        public function saveSubCategory(Request $request){
            //print_r($request->all());exit;
            
            if($request->mode == 'add'){

                $existingSubCategory = TestSubCategory::where('test_subcategory_name', ucwords($request->subcatname))
                ->orWhere('test_subcategory_code', $request->subcatcode)->first();

                if($existingSubCategory){
                    if($existingSubCategory->status == 'Deleted'){
                        $update = TestSubCategory::where('test_subcategory_name', ucwords($request->subcatname))
                        ->orWhere('test_subcategory_code', $request->subcatcode)->update([
                        'test_subcategory_name'=>ucwords($request->subcatname),
                        'test_subcategory_code'=>$request->subcatcode,
                        'test_category' =>$request->testcategory,
                        'status'=>'Active',
                        'updated_at'=>date("Y-m-d H:i:s")
                    ]);
    
                        if($update){
                            return response()->json(['status' => false, 'message' => "Test Sub-Category Saved Successfully"]);
                        }

                    }else{
                        return response()->json(['status' => false, 'message' => "ERROR!! Test Sub-Category Name Or Code already exists"]);
                    }
                    
                }

                $savesubcategory = TestSubCategory::create([
                    'test_subcategory_name'=>ucwords($request->subcatname),
                    'test_subcategory_code'=>$request->subcatcode,
                    'test_category' =>$request->testcategory,
                    'status'=>$request->status 
                ]);

                if($savesubcategory){
                    return response()->json(["Status"=>true,"message"=>"Test Sub-Category Saved Successfully"]);
                }else{
                    return response()->json(['status' => false, 'message' => "Test Sub-Category could not be Saved"]);
                }
                
            }

            if($request->mode == 'edit'){
                $exists = TestSubCategory::where('status','!=','Deleted')->where('test_subcategory_name', ucwords($request->subcatname))->orWhere(
                    'test_subcategory_code', $request->subcatcode)->get();
                if($exists){
                    foreach($exists as $ex){
                        if($request->recordid != $ex->id){
                            return response()->json(['status' => false, 'message' => "ERROR!! Test Sub-Category Name Or Code already exists"]);
                        }

                    }
                }
                $updatecategory = TestSubCategory::where('id', $request->recordid)->update([
                    'test_subcategory_name' => ucwords($request->subcatname),
                    'test_subcategory_code' => $request->subcatcode,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'status' => $request->status
                ]);
                return response()->json(["Status"=>true,"message"=>"Test Sub-Category Updated Successfully"]);


                // $subcatname = TestSubCategory::where('test_subcategory_name',ucwords($request->subcatname))->first();
                // $subcatcode = TestSubCategory::where('test_subcategory_code', $request->subcatcode)->first();

                // if($subcatname && $subcatcode){
                //     return response()->json(['status' => false, 'message' => "ERROR!! Test Sub-Category Name Or Code already exists"]);
                // }else if($subcatname){
                //     $savesubcategory = TestSubCategory::where('id','=',$request->recordid)->update([
                //         'test_subcategory_code'=>$request->subcatcode,
                //         'test_category' =>$request->testcategory,
                //         'updated_at' => date("Y-m-d H:i:s"),
                //         'status'=>$request->status 
                //     ]);
                //     return response()->json(['status' => false, 'message' => "Name Exists!! Sub-category Code Updated Successfully"]);
                // }else if($subcatcode){
                //     $savesubcategory = TestSubCategory::where('id','=',$request->recordid)->update([
                //         'test_subcategory_name'=>ucwords($request->subcatname),
                //         'test_category' =>$request->testcategory,
                //         'updated_at' => date("Y-m-d H:i:s"),
                //         'status'=>$request->status 
                //     ]);
                //     return response()->json(['status' => false, 'message' => "Code Exists!! Sub-category Name Updated Successfully"]);
                // }else{
                //     $savesubcategory = TestSubCategory::where('id','=',$request->recordid)->update([
                //         'test_subcategory_name'=>ucwords($request->subcatname),
                //         'test_subcategory_code'=>$request->subcatcode,
                //         'test_category' =>$request->testcategory,
                //         'updated_at' => date("Y-m-d H:i:s"),
                //         'status'=>$request->status 
                //     ]);
                //     return response()->json(['status' => false, 'message' => "Sub-category Updated Successfully"]);
                // }


                
                // if($savesubcategory){
                //     return response()->json(["Status"=>true,"message"=>"Test Sub-Category Updated Successfully"]);
                // }else{
                //     return response()->json(['status' => false, 'message' => "Test Sub-Category could not be Updated"]);
                // }
            }
            
        }

        public function getDataSubCategory(string $id)
        {
            $testsubcategory = TestSubCategory::where('id', $id)->first();
            return response()->json([$testsubcategory]);
        }

        public function deleteDataSubCategory(string $id)
        {
            // $save = TestSubCategory::where('id','=',$id)
            //     ->update([
            //         'updated_at'  => date('Y-m-d H:i:s'),
            //         'status'      => 'Deleted'
            //     ]);
            $save = TestSubCategory::where('id','=',$id)->delete();
                

                
                if($save){
                    return response()->json([
                        'status' => true,
                        'message' => 'Test SubCategory deleted',
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => "Test SubCategory could not be deleted.",
                    ]);
                }
        }
        

    // ***************************END SUB-CATEGORY MASTER*************************************
// *************************TEST ENTRY**********************************************
    

 

    public function getTestData(){
        $testCategory = TestCategory::where('status', '!=','Inactive')->pluck('test_category_name','id');
        $testData = TestEntry::select('id','test_name','test_category','test_subcategory','test_price','discounts','fprice','test_code','status')->get();

      
        $subcatname = [];
        $catname = [];
        //print_r($testData);
        foreach($testData as $test){
           //echo $test->test_category." ".$test->test_subcategory." ".$test->test_name."<br>";
            $testsubcatname = TestSubCategory::where('id','=',$test->test_subcategory)->select('test_subcategory_name','id','test_category')->get();

            
            foreach($testsubcatname as $testsub){
                //echo "Test SubCategory : ".$testsub->test_subcategory_name." id :".$testsub->id."Test Category :".$testsub->test_category;
                array_push($subcatname,$testsub->test_subcategory_name);
                
                $testcatname = TestCategory::where('id','=',$testsub->test_category)->select('test_category_name')->get();
                
                foreach ($testcatname as $cat) {
                    //echo "Test Category Name: ".$cat->test_category_name."<br>";
                    array_push($catname,$cat->test_category_name);
                }
               
            }
           
        }
        // print_r($subcatname);
        // print_r($catname);
        // exit;
        return view('backend.testEntry',['testCategory'=>$testCategory,'testData'=>$testData,'subcatname'=>$subcatname,'catname'=>$catname]);
    }

    public function subCatFilter(Request $request){
        // print_r($request->all());
        // exit;
        $testsubcatname = TestSubCategory::where('test_category','=',$request->testcategory)->where('status','=','Active')->pluck('test_subcategory_name','id');
        // print_r($testsubcatname);
        // exit;
        return response()->json(['testsubcategory'=>$testsubcatname]);
    }


    public function saveTestEntry(Request $request){
        // print_r($request->all());
        // exit;
        if($request->mode == "add"){

            $existingTestEntry = TestEntry::where('test_name', ucwords($request->testname))
            ->orWhere('test_code', $request->testcode)->first();

            if($existingTestEntry){
                //return response()->json(['status' => false, 'message' => "ERROR!! Test Name Or Code already exists"]);
                if($existingTestEntry->status == 'Deleted'){
                    $update = TestEntry::where('test_name', ucwords($request->testname))
                    ->orWhere('test_code', $request->testcode)->update([
                    'test_name'=>ucwords($request->testname),
                    'test_subcategory'=>$request->subcat,
                    'test_category'=>$request->catname,
                    'test_code'=>$request->testcode,
                    'max_val'=>$request->maxval,
                    'min_val'=>$request->minval,
                    'test_time'=>$request->testtime,
                    'test_price'=>$request->testprice,
                    'discounts'=>$request->discount,
                    'fprice'=>$request->finalprice,
                    'status'=>'Active',
                    'updated_at'=>date("Y-m-d H:i:s")
                ]);

                    if($update){
                        return response()->json(['status' => false, 'message' => "Test Saved Successfully"]);
                    }

                }else{
                    return response()->json(['status' => false, 'message' => "ERROR!! Test Name Or Code already exists"]);
                }

            }

            $saveTest = TestEntry::create([
                'test_name'=>ucwords($request->testname),
                'test_subcategory'=>$request->subcat,
                'test_category'=>$request->catname,
                'test_code'=>$request->testcode,
                'max_val'=>$request->maxval,
                'min_val'=>$request->minval,
                'test_time'=>$request->testtime,
                'test_price'=>$request->testprice,
                'discounts'=>$request->discount,
                'fprice'=>$request->finalprice,
                'status'=>$request->status
            ]);

            if($saveTest){
                return response()->json(['message'=>'Test Saved Successfully']);
            }else{
                return response()->json(['message'=>'Test Could Not Be Saved']);
            }
           
        }

        if($request->mode == "edit"){

            $exists = TestEntry::where('status','!=','Deleted')->where('test_name', ucwords($request->testname))->orWhere(
                'test_code', $request->testcode)->get();
            if($exists){
                foreach($exists as $ex){
                    if($request->recordid != $ex->id){
                        return response()->json(['status' => false, 'message' => "ERROR!! Test Name Or Code already exists"]);
                    }

                }
            }
            $updatecategory = TestEntry::where('id', $request->recordid)->update([
                'test_subcategory'=>$request->subcat,
                'test_category'=>$request->catname,
                'test_code'=>$request->testcode,
                'max_val'=>$request->maxval,
                'min_val'=>$request->minval,
                'test_time'=>$request->testtime,
                'test_price'=>$request->testprice,
                'discounts'=>$request->discount,
                'fprice'=>$request->finalprice,
                'updated_at' => date("Y-m-d H:i:s"),
                'status'=>$request->status
            ]);
            return response()->json(["Status"=>true,"message"=>"Test Updated Successfully"]);
            // $testName = TestEntry::where('test_name',ucwords($request->testname))->first();
            // $testCode = TestEntry::where('test_code',$request->testcode)->first();

            // if($testName && $testCode){
            //     return response()->json(['Status'=>true, 'message'=>'ERROR!! Test Name Or Code already exists']);
            // }else if($testName){
            //     $updateTest = TestEntry::where('id','=',$request->recordid)->update([
            //         'test_subcategory'=>$request->subcat,
            //         'test_category'=>$request->catname,
            //         'test_code'=>$request->testcode,
            //         'max_val'=>$request->maxval,
            //         'min_val'=>$request->minval,
            //         'test_time'=>$request->testtime,
            //         'test_price'=>$request->testprice,
            //         'discounts'=>$request->discount,
            //         'updated_at' => date("Y-m-d H:i:s"),
            //         'status'=>$request->status
            //     ]);
            //     return response()->json(['Status'=>true, 'message'=>'Name Exists!! Rest Updated Successfully']);
            // }else if($testCode){
            //     $updateTest = TestEntry::where('id','=',$request->recordid)->update([
            //         'test_name'=>ucwords($request->testname),
            //         'test_subcategory'=>$request->subcat,
            //         'test_category'=>$request->catname,
            //         'max_val'=>$request->maxval,
            //         'min_val'=>$request->minval,
            //         'test_time'=>$request->testtime,
            //         'test_price'=>$request->testprice,
            //         'discounts'=>$request->discount,
            //         'updated_at' => date("Y-m-d H:i:s"),
            //         'status'=>$request->status
            //     ]);
            //     return response()->json(['Status'=>true, 'message'=>'Code Exists!! Rest Updated Successfully']);
            // }else{
            //     $updateTest = TestEntry::where('id','=',$request->recordid)->update([
            //         'test_name'=>ucwords($request->testname),
            //         'test_subcategory'=>$request->subcat,
            //         'test_category'=>$request->catname,
            //         'test_code'=>$request->testcode,
            //         'max_val'=>$request->maxval,
            //         'min_val'=>$request->minval,
            //         'test_time'=>$request->testtime,
            //         'test_price'=>$request->testprice,
            //         'discounts'=>$request->discount,
            //         'updated_at' => date("Y-m-d H:i:s"),
            //         'status'=>$request->status
            //     ]);
            //     return response()->json(['Status'=>true, 'message'=>'Test Updated Successfully']);
            // }
            
            

            // if($updateTest){
            //     return response()->json(['message'=>'Test Updated Successfully']);
            // }else{
            //     return response()->json(['message'=>'Test Could Not Be Updated']);
            // }
        }
    }
        
    public function getDataTestEntry(string $id)
    {
        $testEntry = TestEntry::where('id', $id)->first();
        return response()->json([$testEntry]);
    }  
    
    public function deleteTestEntry(string $id)
        {
            // $save = TestEntry::where('id','=',$id)
            //     ->update([
            //         'updated_at'  => date('Y-m-d H:i:s'),
            //         'status'      => 'Deleted'
            //     ]);
             $save = TestEntry::where('id','=',$id)->delete();

                if($save){
                    return response()->json([
                        'status' => true,
                        'message' => 'Test deleted',
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => "Test could not be deleted.",
                    ]);
                }
        }


// **************************************************************************************
}