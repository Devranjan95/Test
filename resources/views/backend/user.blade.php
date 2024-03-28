@extends('layouts.master')

@section('content')

    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <form enctype="multipart/form-data" name="userform" id="userform">
                                <input type="hidden" id="saveurl" value="{{ url('user/savedata') }}" />
                                <input type="hidden" id="recordid" name="recordid" value="" />
                                <input type="hidden" id="mode" name="mode" value=""/>
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Manage Users</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        style="color:rgb(250,235,215)" aria-label="Close" onclick="reloadPage()"></button>
                                </div>
                                <div class="modal-body" style="color:black;font-weight:600">
                                    <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                    <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                    <div class='row pb-2'>
                                        <div class='col-md-6'>
                                            <label for="name" class="form-label">Full Name <span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="username" class="form-label">User name <span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="password" class="form-label" id='pwdd'>Password <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter Password" maxlength="8">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="password" class="form-label" id='pwdd1'>Confirm Password <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Confirm Password" maxlength="8">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="email" class="form-label">Email <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Upper-case Only)</span><span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                        </div>
                                        
                                       <div class='col-md-6'>
                                            <label for="dept" class="form-label">Department <span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="status" id='dept' name="dept">
                                                <option value="Operations">Operations</option>
                                                <option value="Radiology">Radiology</option>
                                                <option value="Pathology">Pathology</option>
                                                <option value="Eye">Eye</option>
                                                <option value="Ear">Ear</option>
                                                <option value="Dental">Dental</option>
                                            </select>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="qualification" class="form-label">Qualification <span style="color:#555555;font-size:12px;font-weight:600 ">(Allowed Digits Only)</span></label>
                                            <textarea type="text" class="form-control" id="qualification" name="qualification" placeholder='Enter Qualification'></textarea>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="role" class="form-label">Role <span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="status" id='role' name="role">
                                                <option value="Admin">Admin</option>
                                                <option value="Radiology">Radiology</option>
                                                <option value="Pathology">Pathology</option>
                                                <option value="OTest">OTest</option>
                                                <option value="Front_Office">Front Office</option>
                                            </select>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="status" class="form-label">Status <span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="status" id='status' name="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class='pb-3'>
                                            <hr style='color:green'>
                                            <h6 style="color:green"> Screen Access </h6>
                                        </div>
                                        <div class='col-md-12'>
                                            <div class="row pb-2">
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access1" name="screen_access[]" value="1">
                                                    <label for="screen_access1">Registration</label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access2" name="screen_access[]" value="2">
                                                    <label for="screen_access2">Dashboard</label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access3" name="screen_access[]" value="3">
                                                    <label for="screen_access2">Sample Collection</label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access4" name="screen_access[]" value="4">
                                                    <label for="screen_access2">Result Entry</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access5" name="screen_access[]" value="5">
                                                    <label for="screen_access1">Report Dispatch</label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access6" name="screen_access[]" value="6">
                                                    <label for="screen_access2">Manage User</label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access7" name="screen_access[]" value="7">
                                                    <label for="screen_access2">User Reports</label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <input type="checkbox" id="screen_access8" name="screen_access[]" value="8">
                                                    <label for="screen_access2">Masters</label>
                                                </div>
                                            </div>
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
                                        <h3 class="headingcolor">Users</h3>
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
                                       <th>Sl</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Department</th>
                                       <th>Role</th>
                                       <th>Screens</th>
                                       <th>Status</th>
                                       <th>Actions</th>
                                    </thead>
                                    <tbody>
                                            @php
                                                $sl = 1;
                                            @endphp
                                        @foreach($users as $use)
                                        <tr>
                                            <td>{{$sl++}}</td>
                                            <td>{{$use->name}}</td>
                                            <td>{{$use->email}}</td>
                                            <td>{{$use->department}}</td>
                                            <td>{{$use->role}}</td>
                                            <td>
                                            @php
                                                    // Convert comma-separated screen IDs to names
                                                    $screenIds = explode(',', $use->screens);
                                                    $screenNames = [];
                                                    foreach ($screenIds as $screenId) {
                                                        if (isset($screens[$screenId])) {
                                                            $screenNames[] = $screens[$screenId];
                                                        }
                                                    }
                                                    echo implode(', ', $screenNames);
                                            @endphp
                                            </td>
                                            <td>{{$use->status}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href='#' class='editbtn' onclick='showEdit({{ $use->id }})'
                                                        title='Edit'><img src='assets/images/user.svg'
                                                            style='height:20px; width:20px' /></a>&nbsp&nbsp
                                                    <a href='javascript:void(0)'
                                                        onclick="deleteData('{{ url('user/delete') }}/{{ $use->id }}')"
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
function showAdd() {
    document.getElementById("userform").reset();
    document.getElementById("mode").value = "add";
    document.getElementById("recordid").value = "";
}
function showEdit(id) {
        document.getElementById("userform").reset();
        document.getElementById("mode").value = "edit";
        document.getElementById("recordid").value = id;
        $.ajax({
            url: "{{ url('user/edit') }}/" + id,
            headers: {
                '_token': '{{ csrf_token() }}'
            },
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data);
                let myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('exampleModal'));
                myModal.show();
                $('#pwd').hide();
                $('#pwd2').hide();
                $('#pwdd').hide();
                $('#pwdd1').hide();
                // Accessing user properties from the returned JSON
                document.getElementById("name").value = data[0].name;
                document.getElementById("username").value = data[0].user_name;
                document.getElementById("email").value = data[0].email;
                //document.getElementById("password").value = ''; // Passwords should not be prefilled for security reasons
                document.getElementById("qualification").value = data[0].qualification;
                document.getElementById("department").value = data[0].department;
                document.getElementById("role").value = data[0].role;
                
                // // Parse screens as needed, assuming it's comma-separated
                // let screens = data.screens.split(',');
                // screens.forEach(screen => {
                    
                // });
                // Split screens string into an array
                let screens = data[0].screens.split(',');
                alert(screens);

                // Iterate through each screen ID and check the corresponding checkbox
                screens.forEach(screenId => {
                    // Get the checkbox element by its ID
                    let checkbox = document.getElementById("screen_access" + screenId);
                    
                    // Check if the checkbox exists
                    if (checkbox) {
                        // If it exists, set its 'checked' attribute to true
                        checkbox.checked = true;
                    }
                });

                // Assuming you have a <select> element with the id "status"
                // Set the selected option based on the user's status
                document.getElementById("status").value = data.status;
        },

            error: function() {
                return false;
            }
        });

    }
</script>
<script>
    $('#userform').submit(function(event){
        event.preventDefault();
        var formData = new FormData(document.getElementById('userform'));
        
        formData.append('_token','{{csrf_token()}}')
        // for (var pair of formData.entries()) {
        //     console.log(pair[0] + ': ' + pair[1]);
        // }

        $.ajax({
            type:'POST',
            url:$('#saveurl').val(),
            data:formData,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(response){
                alert(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Check error details in browser console
                alert('Error Saving data');
            }

        })
    })
    
</script>
<script>
    function reloadPage() {
             location.reload(); // Reload the page
        }
</script>

@endsection
