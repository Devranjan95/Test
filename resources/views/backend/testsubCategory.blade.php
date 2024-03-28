@extends('layouts.master')

@section('content')
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" name="testsubcategoryform" id="testsubcategoryform">
                                <input type="hidden" id="saveurl" value="{{ url('testsubcategory/savedata') }}" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode" value=""/>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Manage Test Sub-Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        style="color:rgb(250,235,215)" aria-label="Close" onclick="reloadPage()"></button>
                                </div>
                                <div class="modal-body" style="color:black;font-weight:600">
                                    <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                    <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                    <div class='row pb-2'>
                                        <div class='col-md-6'>
                                            <label for="status" class="form-label">Test Category <span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="status" id='testcategory' name="testcategory">
                                                <!-- <option value="1">Pathology</option>
                                                <option value="2">Radiology</option>
                                                <option value="3">Other</option> -->
                                                <option value="" disabled selected>Please select category</option>
                                                @foreach($testCategory as $key=>$item)
                                                    <option value="{{$key}}">{{$item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="subcatname" class="form-label">Test Sub-Category Name <span style="color:#555555;font-size:12px;font-weight:600 ">(No Spl Characters Allowed)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="subcatname" name="subcatname" placeholder="Enter Test Subcategory Name">
                                        </div>
                                        
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Test Sub-Category Code <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="subcatcode" name="subcatcode" maxlength="8" placeholder="Enter Test Sub-category Code">
                                        </div>
                                       
                                        
                                        
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
                                        <h3 class="headingcolor">Test Sub-Category</h3>
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
                                            <th>Test Sub-Category Name</th>
                                            <th>Test Sub-Category Code</th>
                                            <th>Test Category Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($subCategoryList as $key=>$subcategory)
                                            <tr>
                                                <td>{{$sl++}}</td>
                                                <td>{{$subcategory->test_subcategory_name}}</td>
                                                <td>{{$subcategory->test_subcategory_code}}</td>
                                                <td>{{$l[$key]}}</td>
                                                <td style="color: {{ $subcategory->status === 'Active' ? 'green' : 'red' }}">{{$subcategory->status}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href='#' class='editbtn' onclick='showEdit({{ $subcategory->id }})'
                                                            title='Edit'><img src='assets/images/user.svg'
                                                                style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                        <a href='javascript:void(0)'
                                                            onclick="deleteData('{{ url('testsubcategory/delete') }}/{{ $subcategory->id }}')"
                                                            title='Delete'><img src='assets/images/delete.svg'
                                                                style='height:23px; width:23px' /></a>
                                                    </div>
                                                </td>
                                            </tr>
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
 
// *********************ON CHANGE VALIDATIONS**********************************
    $('#subcatname').on('change', function() {
            var testValue = $(this).val();
            var regex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
            if (!regex.test(testValue)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Digits And Special Characters Not Allowed In SubCategory Name)').slideDown();
            } else {
                // If the input is valid, hide the error message
                $('#error').slideUp();
            }
        });
        $('#subcatname').on('input', function() {
            $('#error').html('');
        });
        $('#subcatcode').on('change', function() {
        var testValue = $(this).val();
        var regex = /^[A-Z]+[1-9]$/; // Allow only uppercase letters and spaces
        if (!regex.test(testValue)) {
            // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!!(Upper-Case Alphabets allowed, Last character must be a digit)').slideDown();
        } else {
            // If the input is valid, hide the error message
            $('#error').slideUp();
        }
    });
    $('#subcatcode').on('input', function() {
            $('#error').html('');
        });
// *********************END ON CHANGE VALIDATIONS**********************************
    $('#testsubcategoryform').submit(function(event){
        //alert(1);
        event.preventDefault();
        var formData = new FormData(document.getElementById('testsubcategoryform'));
        formData.append('_token','{{csrf_token()}}');

// ************************VALIDATIONS****************************************************
        if($('#subcatname').val()=="" || $('#subcatcode').val()=="" || $('#testcategory').val()=="" || $('#status').val()==""){
            $('#error').html('ERROR!! (Missing Mandatory Feilds Please Check * Mark)').slideDown();
            return false;
        }

        var testValue1 = $('#subcatname').val();
        var regex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
        if (!regex.test(testValue1)) {
            // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!! (Digits And Special Characters Not Allowed In SubCategory Name)').slideDown();
            return false;
        } else {
            // If the input is valid, hide the error message
            $('#error').slideUp();
        }

        var testValue2 = $('#subcatcode').val();
        var regex = /^[A-Z]+[1-9]$/; // Allow only uppercase letters and spaces
        if (!regex.test(testValue2)) {
            // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!!(Upper-Case Alphabets allowed, Last character must be a digit)').slideDown();
            return false;
        } else {
            // If the input is valid, hide the error message
            $('#error').slideUp();
        }

// ************************END VALIDATIONS****************************************************
        $.ajax({
            type:'POST',
            url:$('#saveurl').val(),
            data:formData,
            contentType: false, //MUST
            processData: false, //MUST
            dataType: "json",

            success:function(response){
                //alert(response.message);
                if(response.message == "ERROR!! Test Sub-Category Name Or Code already exists"){
                    $('#error').html(response.message).slideDown();
                    setTimeout(function() {
                    $('#error').slideUp();
                    }, 4000);
                }else{
                    $('#success').html(response.message).slideDown();
                    document.getElementById('testsubcategoryform').reset();
                    setTimeout(function() {
                        $('#success').slideUp();
                    }, 2000);
                }
                
                if($('#mode').val()=='edit'){
                    if(response.message == "ERROR!! Test Sub-Category Name Or Code already exists"){
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
                alert('Test Sub-category Cannot Be Saved');
            }
        });
    });

    function showAdd() {
            document.getElementById("testsubcategoryform").reset();
            document.getElementById("mode").value = "add";
            document.getElementById("recordid").value = "";
        }

        function showEdit(id) {
            //alert(id);
            //document.getElementById("testsubcategoryform").reset();
            document.getElementById("mode").value = "edit";
            document.getElementById("recordid").value = id;
            $.ajax({
                url: "{{ url('testsubcategory/edit') }}/" + id,
                headers: {
                    '_token': '{{ csrf_token() }}'
                },
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('exampleModal'));
                    myModal.show();

                     document.getElementById("subcatname").value = data[0].test_subcategory_name;
                     document.getElementById("testcategory").value = data[0].test_category;
                     document.getElementById("subcatcode").value = data[0].test_subcategory_code;
                     document.getElementById("status").value = data[0].status;

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
