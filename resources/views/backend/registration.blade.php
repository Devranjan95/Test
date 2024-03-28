@extends('layouts.master')
@section('content')
<script>
    let x=0;
    let y=0;
</script>
<section class="table-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="card-style">
                <div class="tables-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class='row pb-1'>
                                <div class='col-lg-8'>
                                    <h3 class="headingcolor">Patient Registration <img src="assets/images/registration.svg" alt="" style="width: 25px ;height: 25px;"></h3>
                                </div>
                                <!-- <div class='col-lg-4'>
                                    <h3 class="headingcolor">Patient Registration <img src="assets/images/registration.svg" alt="" style="width: 25px ;height: 25px;"></h3>
                                    <input type="text" id="regn" name="regn" class="form-control rounded" placeholder="Regd-no" aria-label="" aria-describedby="search-addon" />
                                </div> -->
                                <div class='col-lg-4 pb-2'>
                                    <!-- <input type="text" class="form-control" id="search" name="search" placeholder=""> -->
                                    <div class="input-group">
                                        <input type="search" id="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                        <button type="button" class="btn btn-warning" data-mdb-ripple-init>
                                            <img src="assets/images/search.svg" alt="" style="width: 25px ;height: 25px;">
                                           
                                        </button>
                                    </div>
                                </div>
                               
                                <hr>
                                <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                <div class="col-lg-12 text-center pb-3" style="color:green;font-weight:600" id="success"> </div>
                                <form enctype="multipart/form-data" name="registrationform" id="registrationform">
                                    <input type="hidden" id="saveurl" value="{{ url('registration/savedata') }}" />
                                    <input type="hidden" id="recordid" name="recordid" value="" />
                                    
                                    <input type="hidden" id="mode" name="mode" value="add" >
                                    <input type="hidden" id="regdno" name="regdno" value="" >
                                    
                        
                                    
                                    
                                    <div class="col-lg-12 text-center pb-3" style="color:red;font-weight:600" id="error"> </div>
                                    <div class="row pb-2">
                                        <div class='col-md-6  pb-3'>
                                            <label for="name" class="form-label" style="font-weight:500">Full Name <span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="text" class="form-control" id="fname" name="fname" value="" placeholder="Enter First Name">
                                        </div>
                                        <div class='col-md-6  pb-3'>
                                            <label for="phone" class="form-label">Mobile <span style='color:red' title='mandatory feild'>*</span></label>
                                            <input type="pattern" class="form-control" id="phone" name="phone"  maxlength="10"  placeholder="Enter Contact Number">
                                        </div>
                                        
                                    </div>
                                    <div class="row pb-1">
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="row pb-1">
                                        
                                        
                                            <div class='col-md-6 pb-3'>
                                                <label for="age" class="form-label">Date of Birth <span style='color:red' title='mandatory feild'>*</span></label>
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date Of Birth">
                                            </div>
                                        
                                            <div class='col-md-2 pb-3'>
                                                <label for="age" class="form-label">Age(Yr/s)<span style='color:red' title='mandatory feild'>*</span></label>
                                                <input type="hidden" class="form-control" id="age" name="age" >
                                                <input type="number" class="form-control" onchange="updateAge()"  onblur="updateAge()" id="ageyr" name="ageyr" placeholder="Age" readonly>
                                            </div>
                                            <div class='col-md-2 pb-3'>
                                                <label for="age" class="form-label">Month/s</label>
                                                <input type="number" class="form-control" id="agemnth" onchange="updateAge()"  onblur="updateAge()" name="agemnth" placeholder="Mon" readonly>
                                            </div>
                                            <div class='col-md-2 pb-3'>
                                                <label for="age" class="form-label">Day/s</label>
                                                <!-- <input type="hidden" class="form-control" id="age" name="age" > -->
                                                <input type="number" class="form-control" onchange="updateAge()"  onblur="updateAge()" id="agedays" name="agedays" placeholder="Days" readonly>
                                            </div>
                                        
                                        
                                        <!-- <div class='col-md-4 pb-3'>
                                            <label for="priority" class="form-label">Priority</label>
                                            <select class="form-select" aria-label="priority" id='priority' name="priority">
                                                <option value="1">General</option>
                                                <option value="2">Handicap</option>
                                                <option value="3">Senior Citizen</option>
                                                <option value="4">VIP</option>
                                                <option value="5">Emergency</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class='row pb-1'>
                                        
                                        <div class='col-md-6 pb-3'>
                                            <label for="email" class="form-label">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                        
                                        </div>
                                        
                                        <div class='col-md-6 pb-3'>
                                            <label for="phone" class="form-label">Gender<span style='color:red' title='mandatory feild'>*</span></label>
                                            <select class="form-select" aria-label="gender" id='gender' name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                        
                                    </div>
                                    <div>
                                        <hr style="color:red">
                                    </div>
                                   
                                    <div id="dynamic-section">
                                        <div class="row pb-3" data-section-id="0">
                                            <div class="col-md-3">
                                                <label for="testcat" class="form-label">Test Category<span style='color:red' title='mandatory feild'>*</span></label>
                                                <select class="form-select" aria-label="category" id='catname_0' name="catname[]" onchange='loadTestSubCategory(this)'>
                                                    <option value="" disabled selected>Please select category</option>
                                                    @foreach($testcatname as $key=>$name)
                                                        <option value="{{$key}}">{{$name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="subcat" class="form-label">Test SubCategory<span style='color:red' title='mandatory feild'>*</span></label>
                                                <select class="form-select" aria-label="subcategory" id='subcat_0' name="subcat[]" onchange='loadTestName(this)'>
                                                
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="testname" class="form-label">Test Name<span style='color:red' title='mandatory feild'>*</span></label>
                                                <select class="form-select" aria-label="tstname" id='testname_0' name="testname[]" onchange='loadTestPrice(this)'>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="testname" class="form-label">Test price</label>
                                                <input class="form-control" type="text" name='testprice[]' id='testprice_0' readonly/>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="testname" class="form-label">Discounts</label>
                                                <input class="form-control" type="text" name='discount[]' id='discount_0' onchange='calculateFinalPrice(0)'/>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="testname" class="form-label">Final price</label>
                                                <input class="form-control" type="text" name='finalprice[]' id='finalprice_0' readonly/>
                                            </div>
                                            
                                            <div class="col-md-1 mt-4">
                                                <a class='btn btn-sm add-btn' type="button" onclick="addSection(this)"><span><img src="assets/images/add.svg" alt="" width="25px"></span></a>
                                                <a class='btn btn-sm remove-btn' style="display: none;" type="button" onclick="removeSection(this)"><span><img src="assets/images/remove.svg" alt="" width="25px"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <hr style="color:red">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Narration</label>
                                        <textarea class="form-control" id="narration" name = 'narration' rows="3"></textarea>
                                    </div>

                                    
                       
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-sm"  style="background:rgb(12,141,67,0.7)" >Save</button>
                                        <button type="button" class="btn btn-secondary btn-sm reset" style="background:rgb(155,17,30,0.8)">Reset</button>
                                        <!-- <button type="button" onClick="reprintToken()" class="btn btn-secondary btn-sm" style="background:rgb(105,180,120,0.8)">Reprint Last</button> -->
                                    </div>
                                    
                        
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- end col -->
            </div>
        </div>
    </div>
    <!-- **************************************************************** -->
   <!-- Button trigger modal -->



    <!-- ***************************************************************** -->
</section>
<!-- ***************************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="askModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="askModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id='close'></button>
      </div>
      <div class="modal-body" id='newid'>
        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary btn-sm btn-danger" id="confirmPrint" >Generate Bill</button>
      </div>
    </div>
  </div>
</div>
<!-- ****************************************************************************** -->

@endsection
@section('scripts')
<script>

    function addSection(button) {
        var dynamicSection = document.getElementById('dynamic-section');
        var lastSection = dynamicSection.lastElementChild.cloneNode(true);
        var lastSectionId = parseInt(lastSection.getAttribute('data-section-id'));
        var newSectionId = lastSectionId + 1;

        // Update IDs in the cloned section
        lastSection.setAttribute('data-section-id', newSectionId);
        lastSection.querySelectorAll('[id]').forEach(function(element) {
            var oldId = element.getAttribute('id');
            element.setAttribute('id', oldId.replace('_' + lastSectionId, '_' + newSectionId));
        });

        // Clear the value of the cloned price input field
        lastSection.querySelector('input[name="testprice[]"]').value = '';
        lastSection.querySelector('input[name="discount[]"]').value = '';
        lastSection.querySelector('input[name="finalprice[]"]').value = '';
        // Update display style for buttons
        lastSection.querySelector('.add-btn').style.display = 'none';
        lastSection.querySelector('.remove-btn').style.display = 'inline-block';

        dynamicSection.appendChild(lastSection);
        var newDiscountInput = document.getElementById('discount_' + newSectionId);
        newDiscountInput.addEventListener('change', function() {
            calculateFinalPrice(newSectionId);
        });
    }


    function removeSection(button) {
        var section = button.closest('.row');
        section.remove();
    }

    
$('.reset').on('click',function(event){
    event.preventDefault();
    document.getElementById('registrationform').reset();
})
</script>
<script>
    function calculateAge() {
    if ($('#dob').val() == "") {
        console.log("Blank");
        return;
    }
    //console.log($('#dob').val());
    let currentDate = new Date();
    let birthDate = new Date($('#dob').val());
    
    let yearDiff = currentDate.getFullYear() - birthDate.getFullYear();
    let monthDiff = currentDate.getMonth() - birthDate.getMonth();
    let dateDiff = currentDate.getDate() - birthDate.getDate();

    if (monthDiff < 0 || (monthDiff === 0 && dateDiff < 0)) {
        --yearDiff;
    }

    if (monthDiff < 0) {
        monthDiff += 12;
    }

    if (dateDiff < 0) {
        birthDate.setMonth(birthDate.getMonth() + 1, 0);
        dateDiff = birthDate.getDate() - birthDate.getDate() + currentDate.getDate();
        --monthDiff;
    }

    $("#age").val(yearDiff + " Yr " + monthDiff + " month " + dateDiff + " days");
    $("#ageyr").val(yearDiff);
    $("#agemnth").val(monthDiff);
    $("#agedays").val(dateDiff);
}

function updateAge() {
    let yearDiff = ($("#ageyr").val().trim() == "") ? "0" : $("#ageyr").val().trim();
    let monthDiff = ($("#agemnth").val().trim() == "") ? "0" : $("#agemnth").val().trim();
    let dateDiff = ($("#agedays").val().trim() == "") ? "0" : $("#agedays").val().trim();

    $("#age").val(yearDiff + " Yrs " + monthDiff + " months " + dateDiff + " days");
}

$(document).ready(function () {
            $('#dob').on('blur', function () {
                calculateAge();
            });
        });
</script>
<script>

// ****************************************************************************
function loadTestSubCategory(selectElement) {
    var dynamicRow = $(selectElement).closest('.row');
    var subcatSelect = dynamicRow.find('select[name="subcat[]"]');
    var testcategory = $(selectElement).val();

    subcatSelect.empty();
    
    $.ajax({
        type: 'POST',
        url: '{{url("registration/getsubcategory")}}',
        data: { _token: '{{csrf_token()}}', testcategory: testcategory },
        success: function (response) {
            subcatSelect.append('<option value="" disabled selected>Select Subcategory</option>');
            if (response && response.testsubcategory !== undefined && Object.keys(response.testsubcategory).length > 0) {
                $.each(response.testsubcategory, function (value, name) {
                    subcatSelect.append($('<option>', {
                        value: value,
                        text: name
                    }));
                });
            } else {
                console.error('Invalid Subcategory Names structure in the response:', response.testsubcategory);
            }
        },
        error: function () {
            alert('INVALID!!');
        }
    });
}

function loadTestName(selectElement) {
    var dynamicRow = $(selectElement).closest('.row');
    var testnameSelect = dynamicRow.find('select[name="testname[]"]');
    var testsubcat = dynamicRow.find('select[name="subcat[]"]').val();

    testnameSelect.empty();

    $.ajax({
        type: 'POST',
        url: '{{url("registration/gettestname")}}',
        data: { _token: '{{csrf_token()}}', testsubcat: testsubcat },
        success: function (response) {
            testnameSelect.append('<option value="" disabled selected>Select Test Name</option>');
            if (response && response.testname !== undefined && Object.keys(response.testname).length > 0) {
                $.each(response.testname, function (value, name) {
                    testnameSelect.append($('<option>', {
                        value: value,
                        text: name
                    }));
                });
            } else {
                console.error('Invalid Test Names structure in the response:', response.testname);
            }
        },
        error: function () {
            alert('INVALID!!');
        }
    });
}

function loadTestPrice(selectElement) {
    var dynamicRow = $(selectElement).closest('.row');
    var testpriceInput = dynamicRow.find('input[name="testprice[]"]');
    var testname = dynamicRow.find('select[name="testname[]"]').val();
    //alert(testname);
    // Clear the existing value in the input field
    testpriceInput.val('');

    $.ajax({
        type: 'POST',
        url: '{{url("registration/gettestprice")}}',
        data: { _token: '{{csrf_token()}}', testname: testname },
        success: function (response) {
            // Check if the response has the expected structure
            if (response && response.testprice !== undefined) {
                // Set the value in the input field
                testpriceInput.val(response.testprice[0].fprice);
            } else {
                console.error('Invalid Test Price structure in the response:', response.testprice);
            }
        },
        error: function () {
            alert('INVALID!!');
        }
    });
}

 // ****************************************************************************

</script>
<script>
    function calculateFinalPrice(index) {
        var testPrice = parseFloat(document.getElementById('testprice_' + index).value);
        var discount = parseFloat(document.getElementById('discount_' + index).value);
        var finalPrice = testPrice - (testPrice * (discount / 100));
        document.getElementById('finalprice_' + index).value = finalPrice.toFixed(2);
    }
</script>
<script>
// ******************ONCHANGE VALIDATIONS*****************************************

// --------------------------------------------------------------------
    $('#fname').on('change', function(event) {
    var testValue = $(this).val();
    var regex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
    if (!regex.test(testValue)) {
        $('#error').html('ERROR!! (Digits And Special Characters Not Allowed)').slideDown();
    } else {
        $('#error').slideUp();
    }
});

$('#fname').on('input', function() {
    $('#error').html('');
});

$('#phone').on('change', function() {
    var mobileNumber = $(this).val();
    // Criteria 1: Check if the mobile phone number is not less than 10 digits
    // Criteria 2: Check if the mobile phone number contains only digits
    if (!/^\d+$/.test(mobileNumber) || mobileNumber.length < 10 || Array.from(mobileNumber).reduce((sum, digit) => sum + parseInt(digit), 0) === 0 || /^(?:(\d)\1{3})/.test(mobileNumber) || /^(?:1234567890)$/.test(mobileNumber)) {
        $('#error').html('ERROR!! Invalid Mobile Number').slideDown();
    } else {
        $('#error').text('');
    }
});

$('#phone').on('input', function() {
    $('#error').html('');
});

$('#dob').on('change', function() {
    var dob = $(this).val();
    var currentDate = new Date();
    var enteredDate = new Date(dob);

    // Criteria 1: Check if the date of birth is not greater than today's current date
    // Criteria 2: Check if the age does not exceed 101 years span
    if (enteredDate > currentDate || enteredDate.getFullYear() < currentDate.getFullYear() - 101) {
        $('#error').html('ERROR!! Invalid Date of Birth').slideDown();
    } else {
        $('#error').text('');
    }
});

$('#dob').on('input', function() {
    $('#error').html('');
});

$('#email').on('change', function() {
    var email = $(this).val();
    // Use a simple regular expression for basic email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        $('#error').html('ERROR!! Invalid Email Format').slideDown();
    } else {
        $('#error').text('');
    }
});



// *******************************************************************************
$('#registrationform').submit(function(event) {
    event.preventDefault();
    $('#error').html('').hide(); // Clear previous error messages

    var formData = new FormData(document.getElementById('registrationform'));
    formData.append("_token", '{{ csrf_token() }}');

    // Additional checks for mandatory fields
    if ($('#fname').val() == '' || $('#phone').val() == '' || $('#gender').val() == '') {
        $('#error').html('ERROR!! Missing Mandatory Fields Please Check (*) mark').slideDown();
        $('#askModal').modal('hide');
        return false;
    }

    // Additional checks for name format using regex
    var fnameValue = $('#fname').val();
    var fnameRegex = /^[a-zA-Z\s]+$/; // Allow only uppercase letters and spaces
    if (!fnameRegex.test(fnameValue)) {
        $('#error').html('ERROR!! (Digits And Special Characters Not Allowed)').slideDown();
        $('#askModal').modal('hide');
        return false;
    }

    // Validate mobile number
    var mobileNumber = $('#phone').val();
    if (!/^\d+$/.test(mobileNumber) || mobileNumber.length < 10 || Array.from(mobileNumber).reduce((sum, digit) => sum + parseInt(digit), 0) === 0 || /^(?:(\d)\1{3})/.test(mobileNumber) || /^(?:1234567890)$/.test(mobileNumber)) {
        $('#error').html('ERROR!! Invalid Mobile Number').slideDown();
        $('#askModal').modal('hide');
        return false;
    }

    // Validate date of birth
    var dob = $('#dob').val();
    var currentDate = new Date();
    var enteredDate = new Date(dob);
    var maxAllowedAge = 101;
    var minAllowedBirthYear = currentDate.getFullYear() - maxAllowedAge;
    var enteredBirthYear = enteredDate.getFullYear();

    if (enteredDate > currentDate || enteredBirthYear < minAllowedBirthYear) {
        $('#error').html('ERROR!! Invalid Date of Birth').slideDown();
        $('#askModal').modal('hide');
        return false;
    }

    if($('#email').val()!=""){
        // Validate email
        var email = $('#email').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $('#error').html('ERROR!! Invalid Email Format').slideDown();
            $('#askModal').modal('hide');
            return false;
        }
    }
    

    // If all validations pass, proceed with the AJAX request
    $.ajax({
        type: "POST",
        url: $("#saveurl").val(),
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            if (response.message) {
                if(response.message !=""){
                    $('#askModal').modal('show');
                    $('#askModal .modal-body').html('<div>' + response.message + '<br>' + '<span style="color:green;font-weight:600">' + response.registration + '</span></div>');
                    $('#confirmPrint').on('click', function() {
                    alert(1);
                    // Redirect to the print page
                    var printUrl = '{{ url("printpage/printbill") }}'+'/'+response.patid;
                   // $("#previousid").val(response.ids.join('-'));
                    window.open(printUrl, '_blank');
                    // document.getElementById('registrationform').reset();
                    // $('#search').val('');
                    window.location.reload();

                    // Close the modal
                    $('#askModal').modal('hide');
                });
            }
                
                
            } else {
                $('#askModal').modal('hide');
                $('#askModal .modal-body').html('<div style="color:red;font-weight:600">SORRY!! Could Not Be Saved</div>');
                $('#confirmPrint').hide();
            }
        },
        error: function() {
            alert("Error saving data.");
        }
    });
});


$('#search').on('change',function(){
    regn = $('#search').val();
    alert(regn);
    if(regn == ''){
        return;
    }
    $.ajax({
        type:'POST',
        url: '{{ url("registration/showdata") }}',
        data:{_token:'{{csrf_token()}}',regn:regn},
        success:function(response){
           // alert(response);
           if (response.message === 'Not found') {
                alert('Patient not found.'); // Display a message indicating that the patient is not found
            }else{
                var patinfo = response.patinfo;
                $("#regdno").val(regn);
                $('#fname').val(patinfo.pat_name);
                $('#phone').val(patinfo.pat_phno);
                $('#dob').val(patinfo.dob);
                $('#email').val(patinfo.pat_email);
                $('#gender').val(patinfo.pat_gender);
            }
        },
        error:function(){
            alert('not found');
        },
    });
});
</script>
<script>
    function resetForm() {
        // document.getElementById("registrationform").reset();
        // $('#search').val('');
        document.window.reload();
    }
    // Trigger the form reset when the modal close button is clicked
    document.getElementById("close").addEventListener("click", function () {
        resetForm();
    });
</script>


    
@endsection
