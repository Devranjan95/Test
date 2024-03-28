@extends('layouts.master')
@section('content')

<section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
              
                <div class="row pb-3">
                    <div class="col-md-3">
                        <div class="card" style="background-color: rgb(143,188,143); color: #195905;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">Total Registered</h5>
                                        <h2 class="card-text">{{$registeredCount}}</h2>
                                    </div>
                                    <div class="card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M8 0c2.5 0 4.5 2 4.5 4.5S10.5 9 8 9s-4.5-2-4.5-4.5S5.5 0 8 0zm0 1.5c-1.927 0-3.5 1.573-3.5 3.5S6.073 8.5 8 8.5 11.5 6.927 11.5 5 9.927 1.5 8 1.5zm0 7a3 3 0 0 0-3 3v1.25C5 13.702 6.098 15 7.5 15h1c1.402 0 2.5-1.298 2.5-2.25V11a3 3 0 0 0-3-3zm0 6c-.75 0-1.5-.1-1.5-.75V13h3v1.75c0 .65-.75.75-1.5.75z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: rgb(143,188,143); color: #195905;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">Total Pending</h5>
                                        <h2 class="card-text">{{$pendingCount}}</h2>
                                    </div>
                                    <div class="card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M8 0c2.5 0 4.5 2 4.5 4.5S10.5 9 8 9s-4.5-2-4.5-4.5S5.5 0 8 0zm0 1.5c-1.927 0-3.5 1.573-3.5 3.5S6.073 8.5 8 8.5 11.5 6.927 11.5 5 9.927 1.5 8 1.5zm0 7a3 3 0 0 0-3 3v1.25C5 13.702 6.098 15 7.5 15h1c1.402 0 2.5-1.298 2.5-2.25V11a3 3 0 0 0-3-3zm0 6c-.75 0-1.5-.1-1.5-.75V13h3v1.75c0 .65-.75.75-1.5.75z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: rgb(143,188,143); color: #195905;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">Total Sample Collection</h5>
                                        <h2 class="card-text">{{$sampleCollectionCount}}</h2>
                                    </div>
                                    <div class="card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M8 0c2.5 0 4.5 2 4.5 4.5S10.5 9 8 9s-4.5-2-4.5-4.5S5.5 0 8 0zm0 1.5c-1.927 0-3.5 1.573-3.5 3.5S6.073 8.5 8 8.5 11.5 6.927 11.5 5 9.927 1.5 8 1.5zm0 7a3 3 0 0 0-3 3v1.25C5 13.702 6.098 15 7.5 15h1c1.402 0 2.5-1.298 2.5-2.25V11a3 3 0 0 0-3-3zm0 6c-.75 0-1.5-.1-1.5-.75V13h3v1.75c0 .65-.75.75-1.5.75z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: rgb(143,188,143); color: #195905;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">Total Dispatched</h5>
                                        <h2 class="card-text">{{$dispatchedCount}}</h2>
                                    </div>
                                    <div class="card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M8 0c2.5 0 4.5 2 4.5 4.5S10.5 9 8 9s-4.5-2-4.5-4.5S5.5 0 8 0zm0 1.5c-1.927 0-3.5 1.573-3.5 3.5S6.073 8.5 8 8.5 11.5 6.927 11.5 5 9.927 1.5 8 1.5zm0 7a3 3 0 0 0-3 3v1.25C5 13.702 6.098 15 7.5 15h1c1.402 0 2.5-1.298 2.5-2.25V11a3 3 0 0 0-3-3zm0 6c-.75 0-1.5-.1-1.5-.75V13h3v1.75c0 .65-.75.75-1.5.75z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
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
                                        <h3 class="headingcolor">Todays Token List</h3>
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
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>Tokens</th>
                                        <th>Cat</th>
                                        <th>Sub-Cat</th>
                                        <th>Tests</th>
                                        <th>Token Status</th>
                                        <th>See Bill</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tokinfo as $key => $tok)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tok->pat_regno }}</td>
                                        <td>{{ $oinfo[$key]['patname'] }}</td>
                                        <td>{{ $tok->tok_no }}</td>
                                        <td>{{ $oinfo[$key]['category'] }}</td>
                                        <td>{{ $oinfo[$key]['subcat'] }}</td>
                                        <td>{{ $oinfo[$key]['test'] }}</td>
                                        <td style="color: 
                                            @if($tok->status == 'Registration Completed')
                                                blue;
                                            @elseif($tok->status == 'Bill Pending')
                                                red;
                                            @elseif($tok->status == 'Sample Collection')
                                                orange;
                                            @elseif($tok->status == 'Dispatched')
                                                green;
                                            @endif
                                        ">
                                           <span style = 'animation: blinker 3s linear infinite; font-weight:600'> {{ $tok->status }} </span> 
                                        </td>
                                        <td><a href="" onclick='printreg("{{ $tok->pat_regno }}")'><img src="assets/images/bill.png" alt="not found" width='30px' height='30px'></a></td>
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
    function printreg(regno){
        alert(regno);
        let reg = regno;
        if(reg != ''){
            $.ajax({
                type:'GET',
                url:'{{url("print/printval")}}'+'/'+reg,
                success:function(response){
                    //alert(response);
                    var url = '{{url("print/printval")}}'+'/'+reg
                    window.location.href = url;
                   
                },
                error:function(){

                }
            });
        }
    }

</script>


    
@endsection
