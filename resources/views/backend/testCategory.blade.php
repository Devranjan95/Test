@extends('layouts.master')

@section('content')
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" name="testCategoryform" id="testCategoryform">
                                <input type="hidden" id="saveurl" value="{{ url('testcategory/savedata') }}" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode" value="">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Manage Test-Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        style="color:rgb(250,235,215)" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="color:black;font-weight:600">
                                    <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                    <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                    <div class='row pb-2'>
                                        <div class='col-md-6'>
                                            <label for="testcatname" class="form-label">Test Category Name <span style="color:#555555;font-size:12px;font-weight:600 ">(No Spl Characters Allowed)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="testcatname" name="testcatname" placeholder="Enter Test Category">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="testcatname" class="form-label">Test Category Code <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="testcatcode" name="testcatcode" placeholder="Enter Test Category Code" maxlength='8'>
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
                                        <h3 class="headingcolor">Test Category</h3>
                                    </div>
                                    <!-- <div class='col-lg-6 pb-2'>
                                        <button type="button" class="btn btn-success btn-sm " style="float:right"
                                            data-bs-toggle="modal" onclick="showAdd()" data-bs-target="#exampleModal">Add
                                            New</button>
                                    </div> -->
                                    <hr style="color:#030d04">
                                </div>
                            </div>
                            <div class='col-lg-12'>
                                <table class="data-table table-striped datatable" style="width:100%;font-size:14px">
                                    <thead style="background:#1B8A6B;color:#fff; height:42px;">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Test Category Name</th>
                                            <th>Test Category Code</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sl=1;
                                        ?>
                                    @foreach($categorylist as $category)
                                        <tr>
                                            <td>{{$sl++}}</td>
                                            <td>{{ $category->test_category_name }}</td>
                                            <td>{{ $category->test_category_code }}</td>
                                            <td style="color: {{ $category->status === 'Active' ? 'green' : 'red' }}">
                                                    {{ $category->status }}
                                             </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href='#' class='editbtn' onclick='showEdit({{ $category->id }})'
                                                        title='Edit'><img src='assets/images/user.svg'
                                                            style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                    <!-- <a href='javascript:void(0)'
                                                        onclick="deleteData('{{ url('testcategory/delete') }}/{{ $category->id }}')"
                                                        title='Delete'><img src='assets/images/delete.svg'
                                                            style='height:23px; width:23px' /></a> -->
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
    $('#testcatname').on('change', function() {
            var testValue = $(this).val();
            var regex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
            if (!regex.test(testValue)) {
                // If the input contains lowercase letters, digits, or special characters, show an error message
                $('#error').html('ERROR!! (Digits And Special Characters Not Allowed)').slideDown();
            } else {
                // If the input is valid, hide the error message
                $('#error').slideUp();
            }
        });
        $('#testcatname').on('input', function() {
            $('#error').html('');
        });
    $('#testcatcode').on('change', function() {
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
    $('#testcatcode').on('input', function() {
            $('#error').html('');
        });
    $('#testcatname').on('input', function() {
        $('#error').html('');
    });
    $('#testCategoryform').submit(function(event){
        //alert(1);
        event.preventDefault();
        var formData = new FormData(document.getElementById('testCategoryform'));
        formData.append("_token","{{ csrf_token() }}");
        //console.log(formData);
        // *************************validations*******************  

        if($('#testcatname').val()==''||$('#testcatcode').val()==""||$('#status').val()==""){
            $('#error').html('ERROR!! (Missing Mandatory Feilds Check * Mark)').slideDown();
            return false;
        }
        var testValuename = $('#testcatname').val();
        var regex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
        if (!regex.test(testValuename)) {
            // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!! (Digits And Special Characters Not Allowed)').slideDown();
            return false;
        } 

        var testValuecode = $('#testcatcode').val();
        var regex = /^[A-Z]+[1-9]$/; // Allow only uppercase letters and spaces
        if (!regex.test(testValuecode)) {
            // If the input contains lowercase letters, digits, or special characters, show an error message
            $('#error').html('ERROR!!(Upper-Case Alphabets allowed, Last character must be a digit)').slideDown();
            return false;
        }
        // **************************************************************************

        $.ajax({
            type:'POST',
            url:$('#saveurl').val(),
            data:formData,
            contentType: false, //MUST
            processData: false, //MUST
            dataType: "json",

            success:function(response){
                //alert(response.message);
                if(response.message == "ERROR!! Test Category Name Or Code already exist"){
                    $('#error').html(response.message).slideDown();
                    setTimeout(function() {
                    $('#error').slideUp();
                    }, 4000);
                }else{
                    $('#success').html(response.message).slideDown();
                    document.getElementById('testCategoryform').reset();
                    setTimeout(function() {
                        $('#success').slideUp();
                    }, 2000);
                }
                

                if($('#mode').val()=='edit'){
                    if(response.message == "ERROR!! Test Category Name Or Code already exist"){
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
                alert('Error Saving data');
            }
        })
    })
    function showAdd() {
            document.getElementById("testCategoryform").reset();
            document.getElementById("mode").value = "add";
            document.getElementById("recordid").value = "";
        }

        function showEdit(id) {
            //alert(id);
            document.getElementById("testCategoryform").reset();
            document.getElementById("mode").value = "edit";
            document.getElementById("recordid").value = id;
            $.ajax({
                url: "{{ url('testcategory/edit') }}/" + id,
                headers: {
                    '_token': '{{ csrf_token() }}'
                },
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('exampleModal'));
                    myModal.show();

                     document.getElementById("testcatname").value = data[0].test_category_name;
                     document.getElementById("testcatcode").value = data[0].test_category_code;
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
