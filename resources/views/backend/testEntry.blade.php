@extends('layouts.master')

@section('content')
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" name="testentryform" id="testentryform">
                                <input type="hidden" id="saveurl" value="{{ url('testentry/savedata') }}" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode" value=""/>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Manage Test Entry</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        style="color:rgb(250,235,215)" aria-label="Close" onclick="reloadPage()"></button>
                                </div>
                                <div class="modal-body" style="color:black;font-weight:600">
                                    <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                    <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                    <div class='row pb-2'>
                                        <div class='col-md-6'>
                                            <label for="status" class="form-label">Test Category name <span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="status" id='catname' name="catname" onchange='loadTestSubCategory()'>
                                                 <option value="" disabled selected>Please select category</option>
                                                @foreach($testCategory as $key=>$item)
                                                    <option value="{{$key}}">{{$item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="status" class="form-label">Test Sub-Category name <span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="status" id='subcat' name="subcat">
                                            </select>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Test Name <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="testname" name="testname" placeholder="Enter Test Name">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Test Code <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="testcode" name="testcode" placeholder="Enter Test Code" maxlength="8">
                                        </div>
                                        <div class='pt-3 text-success'>
                                           Test Parameters<hr>
                                        </div>
                                       <div class='col-md-6'>
                                            <label for="name" class="form-label">Max Value <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Digits Only)</span></label>
                                            <input type="text" class="form-control" id="maxval" name="maxval" placeholder="Enter Max Val" maxlength='9'>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Min Value <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Digits Only)</span></label>
                                            <input type="text" class="form-control" id="minval" name="minval" placeholder="Enter Min Val" maxlength='9'>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Test Time <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Digits Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="testtime" name="testtime" placeholder="Enter Time In Days" maxlength='2'>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Test Price <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Digits Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="testprice" name="testprice" placeholder="Enter Test Price" maxlength='9'>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Discounts<span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Digits Only)</span></label>
                                            <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount %" maxlength='2'>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Final Price <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Digits Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="finalprice" name="finalprice" placeholder="---" maxlength='9' readonly>
                                        </div>
                                        <!-- <div class='col-md-6'>
                                            <label for="name" class="form-label">GST<span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GST %" maxlength='2'>
                                        </div> -->
                                        <div class='col-md-6'>
                                            <label for="status" class="form-label">Status <span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="status" id='status' name="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                                        style="background:rgb(155,17,30,0.8)" onclick="reloadPage()">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        style="background:rgb(12,141,67,0.7)">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- =================================================== -->
                <!-- ========== tables-wrapper start ========== -->
                <div class="card-style mb-30">
                    <div class="tables-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class='row pb-2'>
                                    <div class='col-lg-6'>
                                        <h3 class="headingcolor">Test Entry</h3>
                                    </div>
                                    <div class='col-lg-6 pb-2'>
                                        <button type="button" class="btn btn-success btn-sm " style="float:right"
                                            data-bs-toggle="modal" onclick="showAdd()" data-bs-target="#exampleModal">Add
                                            New</button>
                                    </div>
                                    <hr style="color:#030d04">
                                </div>
                            </div>
                            <div class='col-lg-12'>
                                <table class="data-table table-striped datatable" style="width:100%;font-size:14px">
                                    <thead style="background:#1B8A6B;color:#fff; height:42px;">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Test Name</th>
                                            <th>Test Category</th>
                                            <th>Test Sub-Category</th>
                                            <th>Test Code</th>
                                            <th>Test Price</th>
                                            <th>Discounts %</th>
                                            <th>Final Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                    @foreach($testData as $key => $test)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $test->test_name }}</td>
                                            <td>{{ $catname[$i] }}</td>
                                            <td>{{ $subcatname[$i] }}</td>
                                            <td>{{ $test->test_code }}</td>
                                            <td>{{ $test->test_price }}</td>
                                            <td>{{ $test->discounts ?? 'N/A' }}</td>
                                            <td>{{ $test->fprice }}</td>
                                            <td style="color: {{ $test->status === 'Active' ? 'green' : 'red' }}">{{ $test->status }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href='#' class='editbtn' onclick='showEdit({{ $test->id }})'
                                                        title='Edit'><img src='assets/images/user.svg'
                                                            style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                    <a href='javascript:void(0)'
                                                        onclick="deleteData('{{ url('testentry/delete') }}/{{ $test->id }}')"
                                                        title='Delete'><img src='assets/images/delete.svg'
                                                            style='height:23px; width:23px' /></a>
                                                 </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- ========== tables-wrapper end ========== -->
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
<script>
function calculateFinalPrice() {
    var testPrice = parseFloat($('#testprice').val()) || 0;
    var discount = parseFloat($('#discount').val());

    if (!isNaN(discount) && discount !== null) {
        // Calculate final price with discount
        var discountedPrice = testPrice - (testPrice * (discount / 100));
        $('#finalprice').val(discountedPrice.toFixed(2));
    } else {
        // If discount is null or not a valid number, set final price to test price
        $('#finalprice').val(testPrice.toFixed(2));
    }
}
    $('#testname').on('change', function() {
            var testValue = $(this).val();
            var regex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
            if (!regex.test(testValue)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Digits And Special Characters Not Allowed In Test Name)').slideDown();
            } 
        });
        $('#testname').on('input', function() {
            $('#error').html('');
        });

     $('#testcode').on('change', function() {
        var testValue = $(this).val();
        var regex = /^[A-Z]+[1-9]$/; // Allow only uppercase letters and spaces
        if (!regex.test(testValue)) {
            // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!!(Upper-Case Alphabets allowed, Last character must be a digit in Test Code)').slideDown();
        } 
    });
    $('#testcode').on('input', function() {
            $('#error').html('');
        });

    // $('#maxval').on('change',function(){
    //     var testValue = $(this).val();
    //     var regex = /^\d*\.?\d+$/;
    //     if (!regex.test(testValue)) {
    //             // If the input contains lowercase letters, digits, or special characters, show an error message
    //         $('#error').html('ERROR!! (Only Digits Allowed In Max-Value)').slideDown();
    //     } 

    // });
    // $('#maxval').on('input', function() {
    //     var testValue = $(this).val();
    //     var regex = /^\d*\.?\d+$/;
    //     if (!regex.test(testValue)) {
    //             // If the input contains lowercase letters, digits, or special characters, show an error message
    //         $('#error').html('ERROR!! (Only Digits Allowed In Min-Value)').slideDown();
    //     }
    //     if(parseInt($('#maxval').val()) <= parseInt(testValue)){
    //         $('#error').html('ERROR!! (Max Value Should Be Greater Than Min Value)').slideDown();
    //     }
    // });
    
    // $('#minval').on('input',function(){
    //     var testValue = $(this).val();
    //     var regex = /^\d*\.?\d+$/;
    //     if (!regex.test(testValue)) {
    //             // If the input contains lowercase letters, digits, or special characters, show an error message
    //         $('#error').html('ERROR!! (Only Digits Allowed In Min-Value)').slideDown();
    //     }
    //     if(parseInt($('#maxval').val()) <= parseInt(testValue)){
    //         $('#error').html('ERROR!! (Min-Value Exceeding or Equal to Max-Value)').slideDown();
    //     }

    // });
    $('#maxval').on('change', function() {
    var testValue = $(this).val();
    var regex = /^-?\d*\.?\d+$/; // Allowing an optional negative sign
    if (!regex.test(testValue)) {
        $('#error').html('ERROR!! (Only Digits Allowed In Max-Value)').slideDown();
    } else {
        $('#error').slideUp(); // Hide the error message if the input is valid
    }
});

$('#maxval').on('input', function() {
    var testValue = $(this).val();
    var regex = /^-?\d*\.?\d+$/; // Allowing an optional negative sign
    if (!regex.test(testValue)) {
        $('#error').html('ERROR!! (Only Digits Allowed In Max-Value)').slideDown();
    } else {
        $('#error').slideUp(); // Hide the error message if the input is valid
    }

    // Check if max value is greater than min value
    if (parseFloat(testValue) <= parseFloat($('#minval').val())) {
        $('#error').html('ERROR!! (Max Value Should Be Greater Than Min Value)').slideDown();
    } else {
        $('#error').slideUp(); // Hide the error message if the input is valid
    }
});

$('#minval').on('input', function() {
    var testValue = $(this).val();
    var regex = /^-?\d*\.?\d+$/; // Allowing an optional negative sign
    if (!regex.test(testValue)) {
        $('#error').html('ERROR!! (Only Digits Allowed In Min-Value)').slideDown();
    } else {
        $('#error').slideUp(); // Hide the error message if the input is valid
    }

    // Check if min value is less than max value
    if (parseFloat(testValue) >= parseFloat($('#maxval').val())) {
        $('#error').html('ERROR!! (Min-Value Should Be Less Than Max-Value)').slideDown();
    } else {
        $('#error').slideUp(); // Hide the error message if the input is valid
    }
});

    

    $('#testtime').on('change',function(){
        var testValue = $(this).val();
        var regex = /^[0-9]+$/;
        if (!regex.test(testValue)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!! (Test Time Allows Digits In Days)').slideDown();
        } 

    });
    $('#testtime').on('input', function() {
            $('#error').html('');
        });

    $('#testprice').on('change',function(){
        var testValue = $(this).val();
        var regex = /^\d*\.?\d+$/;
        if (!regex.test(testValue)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!! (Test Price Should Be Digit)').slideDown();
        }else{
            calculateFinalPrice();
        }

    });
    $('#testprice').on('input', function() {
            $('#error').html('');
        });
    

    $('#discount').on('change',function(){
        var testValue = $(this).val();
        var regex = /^[0-9]+$/;
        if (!regex.test(testValue)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!! (Discount Allows Digits In %)').slideDown();
        }else{
            calculateFinalPrice();
        } 

    });
    $('#discount').on('input', function() {
            $('#error').html('');
        });
        
    function loadTestSubCategory(subcategory=""){
        var testcategory = $('#catname').val();
        $('#subcat').empty();
        $.ajax({
            type:'POST',
            url:'{{url("testentry")}}',
            data:{_token:'{{csrf_token()}}',testcategory:testcategory},
            success:function(response){
                $('#subcat').append('<option value="">Select Subcategory</option>');
                if (response && response.testsubcategory !== undefined && Object.keys(response.testsubcategory).length > 0) {
                        // Add each department as an option
                        $.each(response.testsubcategory, function (value, name) {
                            $('#subcat').append($('<option>', {
                                value: value,
                                text: name
                            }));
                        });
                        $("#subcat").val(subcategory);
                } else {
                    console.error('Invalid Subcategory Names structure in the response:', response.testsubcategory);
                }
            },
            error:function(){
                alert('INVALID!!');
            }
        });
     }
</script>
<script>
     $('#testentryform').submit(function(event){
        
        event.preventDefault();
        var formData = new FormData(document.getElementById('testentryform'));
        formData.append('_token','{{csrf_token()}}');

        if( $('#catname').val()==null || $('#subcat').val()==null  || $('#testname').val()=="" || $('#testcode').val()=="" ||$('#testtime').val()=="" || $('#testprice').val()=="")
        {
            $('#error').html('ERROR!! (Missing Mandatory Feilds Please Check * Mark)');
            return false;
        }
        if($('#testname').val()!=''){
            var testValue1 = $('#testname').val();
            var regex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
            if (!regex.test(testValue1)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Digits And Special Characters Not Allowed In Test Name)').slideDown();
                return false;
            }
        }
        if($('#testcode').val()!=''){
            var testValue2 = $("#testcode").val();
            var regex = /^[A-Z]+[1-9]$/; // Allow only uppercase letters and spaces
            if (!regex.test(testValue2)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!!(Upper-Case Alphabets allowed, Last character must be a digit in Test Code)').slideDown();
                return false;
            } 
        }

        if($('#maxval').val()!='' || $('#minval').val()!=''){
            var maxValue = $('#maxval').val();
            var regex = /^\d*\.?\d+$/;
            if (!regex.test(maxValue)) {
                    // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Only Digits Allowed In Min-Value)').slideDown();
                return false;
            }
            if(parseFloat($('#maxval').val()) <= parseFloat($('#minval').val())){
                $('#error').html('ERROR!! (Max Value Should Be Greater Than Min Value)').slideDown();
                return false;
            }
        }
       
        if($('#testprice').val()!=''){
            var testPrice = $('#testprice').val();
            var regex = /^\d*\.?\d+$/;
            if (!regex.test(testPrice)) {
                    // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Test Price Should Be Digit)').slideDown();
                return false;
            }
        }
        if($('#testtime').val()!=''){
            var testtime = $('#testtime').val();
            var regex = /^[0-9]+$/;
            if (!regex.test(testtime)) {
                    // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Test Time Allows Digits In Days)').slideDown();
                return false;
            } 
        }
        
       
        if($('#discount').val()!=""){
            var discount = $('#discount').val();
            var regex = /^[0-9]+$/;
            if (!regex.test(discount)) {
                    // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Discount Allows Digits In %)').slideDown();
                return false;
            }
        }
        

        $.ajax({
            type:'POST',
            url:$('#saveurl').val(),
            data:formData,
            contentType: false, //MUST
            processData: false, //MUST
            dataType: "json",

            success:function(response){
                //alert(response.message);
                if(response.message == "ERROR!! Test Name Or Code already exists"){
                    $('#error').html(response.message).slideDown();
                    setTimeout(function() {
                    $('#error').slideUp();
                    }, 4000);
                }else{
                    $('#success').html(response.message).slideDown();
                    document.getElementById('testentryform').reset();
                    setTimeout(function() {
                        $('#success').slideUp();
                    }, 2000);
                }

                if($('#mode').val()=='edit'){
                    if(response.message == "ERROR!! Test Name Or Code already exists"){
                        $('#error').html(response.message).slideDown();
                        setTimeout(function() {
                        $('#error').slideUp();
                        }, 4000);
                    }else{
                            location.reload();
                    }
                }
                
            },
            error:function(){
                alert('Test Cannot Be Saved');
            }
        });
    });

    function showAdd() {
            document.getElementById("testentryform").reset();
            document.getElementById("mode").value = "add";
            document.getElementById("recordid").value = "";
        }

        function showEdit(id) {
            document.getElementById("testentryform").reset();
            document.getElementById("mode").value = "edit";
            document.getElementById("recordid").value = id;
            $.ajax({
                url: "{{ url('testentry/edit') }}/" + id,
                headers: {
                    '_token': '{{ csrf_token() }}'
                },
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('exampleModal'));
                    myModal.show();

                    document.getElementById("testname").value = data[0].test_name;
                    // alert(data[0].test_category);
                    document.getElementById("catname").value = data[0].test_category;
                   
                    loadTestSubCategory(data[0].test_subcategory);
                    //document.getElementById("subcat").value = data[0].test_subcategory;
                   
                     
                    //document.getElementById("subcat").value = "Test";
                    document.getElementById("testcode").value = data[0].test_code;
                    document.getElementById("maxval").value = data[0].max_val;
                    document.getElementById("minval").value = data[0].min_val;
                    document.getElementById("testtime").value = data[0].test_time;
                    document.getElementById("testprice").value = data[0].test_price;
                    document.getElementById("discount").value = data[0].discounts;
                    document.getElementById("finalprice").value = data[0].fprice;
                    // document.getElementById("gst").value = data[0].gst;
                    document.getElementById("status").value = data[0].status;
                   

                    //document.getElementById("status").value = "";

                },
                error: function() {
                    return false;
                }
            });

        }

        function reloadPage() {
             location.reload(); // Reload the page
        }
</script>
@endsection
