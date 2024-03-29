<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="" type="image/x-icon" />
        <title>Patient calling system</title>
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset(Session::get('app.favicon')) }}" type="image/x-icon" />
        <!-- template bootstrap -->

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
       
        <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}"/>
        
        <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/printreport.css') }}"/>
        
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-multiselect.css') }}"/>
        
        <script src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        
        <script src="{{ asset('assets/js/typeahead.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment1.min.js') }}"></script>

         <!--End Typeahead-->
         <style>
    @keyframes blinker {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }
</style>
        @stack('styles')
    </head>
    <body>
        <!-- ======== Preloader =========== -->
    <div id="preloader"><div class="spinner"></div></div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
          <a href="{{ url('dashboard'); }}"><img src="assets/images/llogo.svg" alt="noimg" style='margin-left:30px;margin-top:-20px;width:70%'></a>
      </div>
      
      <nav class="sidebar-nav">
        <ul>
         
          <li class="nav-item" style='border-bottom:1px solid #808080'>
            <a href="{{url('dashboard')}}">
              <span class="icon"><img src="assets/sf/dashboard.svg" height="32px" width="32px" alt=""></span>
              <span class="text">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item" style='border-bottom:1px solid #808080'>
            <a href="{{url('registration')}}">
              <span class="icon">
                <img src="assets/sf/registration.svg"  height="32px" width="32px" alt="">
              </span>
              <span class="text">Registration</span>
            </a>
          </li>
          
          <li class="nav-item nav-item-has-children"  style='border-bottom:1px solid #808080'>
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon"> <img src="assets/sf/microscope.svg"  height="32px" width="32px" alt=""></span>
              <span class="text">Operations</span>
            </a>
            <ul id="ddmenu_3" class="collapse dropdown-nav">
              <li><a href="{{url('pathologysample')}}">Test Sample Collection </a></li>
              <li><a href="{{url('specimentest')}}">Test Result Entry </a></li>
              <li><a href="{{url('specimentest')}}">Test Result Dispatch </a></li>
            </ul>
          </li>
          
          <li class="nav-item nav-item-has-children"  style='border-bottom:1px solid #808080'>
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon"> <img src="assets/sf/user.svg"  height="32px" width="32px" alt=""></span>
              <span class="text">Users</span>
            </a>
            <ul id="ddmenu_4" class="collapse dropdown-nav">
              <li><a href="#" onclick="openUrl('promotioncampain')"> Create User </a></li>
              <li><a href="#" onclick="openUrl('patientq')"> User Report </a></li>
            </ul>
          </li>
          <li class="nav-item nav-item-has-children" style='border-bottom:1px solid #808080;'>
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation" >
              <span class="icon"> <img src="assets/sf/lock.svg"  height="32px" width="32px" alt=""> </span>
              <span class="text">Masters</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              
              
              <li> <a href="{{ url('testcategory') }}"> Test Category </a></li>
              <li><a href="{{ url('testsubcategory')}}"> Test Sub-category </a></li>
              <li> <a href="{{ url('testentry') }}"> New Test Entry</a> </li>
              
            </ul>
          </li> 
           
          <!-- <li class="nav-item nav-item-has-children"  style='border-bottom:1px solid #808080'>
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_6" aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon"> <img src="assets/sf/dispatch.png"  height="32px" width="32px" alt=""></span>
              <span class="text">Dispatch</span>
            </a>
            <ul id="ddmenu_6" class="collapse dropdown-nav">
              <li><a href="{{url('medicinedispatch')}}"> Medicine Distribution </a></li>
              <li><a href="{{url('testdispatch')}}"> Test Report Dispatch </a></li>
            </ul>
          </li> -->
          
          <!-- <li class="nav-item"  style='border-bottom:1px solid #808080'>
            <a href="{{ url('docschedule') }}">
              <span class="icon"><img src="assets/sf/scheduling.png"   alt=""></span>
              <span class="text">Schedule</span>
            </a>
          </li> -->
          
          <!-- <li class="nav-item"  style='border-bottom:1px solid #808080'>
            <a href="{{ url('users') }}">
              <span class="icon"><img src="assets/sf/user.svg"  height="32px" width="32px" alt=""></span>
              <span class="text">Users</span>
            </a>
          </li> -->
          
          <!-- <li class="nav-item nav-item-has-children"  style='border-bottom:1px solid #808080'>
            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_5" aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon"> <img src="assets/sf/report.svg"  height="32px" width="32px" alt=""></span>
              <span class="text">Reports</span>
            </a>
            <ul id="ddmenu_5" class="collapse dropdown-nav">
             
              <li><a href="{{url('patientreport')}}"> Patientlist Report </a></li>
              
            </ul>
          </li> -->
          
          
         
        </ul>
      </nav>

    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-15">
                        <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                        <i class="lni lni-chevron-left"></i>
                        </button>
                    </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">
                    <!-- profile start -->
                    <div class="profile-box ml-15">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-info">
                            <div class="info">
                            <div class="image">
                                <img src="" alt="" />
                            </div>
                            <div>
                                <h6 class="fw-500" style='color:#fff'></h6>
                                <!-- <p style='color:#fff'>hrms</p> -->
                            </div>
                            </div>
                        </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                        <li>
                            <div class="author-info flex items-center !p-1">
                            <!-- <div class="image">
                                <img src="photo" alt="image">
                            </div> -->
                            <div class="content">
                                <h4 class="text-sm">HMS </h4>
                                <!-- <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs" href="#">email</a> -->
                            </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{url('viewprofile')}}" >
                            <!-- <i class="lni lni-user"></i> View Profile -->
                            <img src="assets/sf/user.svg" alt="">View Profile
                            </a>
                        </li>
<!--                         
                        <li>
                            <a href="#0">
                             <i class="lni lni-alarm"></i> Notifications 
                            <img src="assets/sf/message.svg" alt="">Notifications
                            </a>
                        </li>
                        <li>
                            <a href="#0"> <i class="lni lni-inbox"></i> Messages </a> 
                            <a href="#0"><img src="assets/sf/sms.svg" alt="">Messages</a>
                        </li>
                        <li>
                            <a href="#0"> <i class="lni lni-cog"></i> Settings </a>
                            <a href="#0"><img src="assets/sf/settings.svg" alt="">Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <!-- <a href="#0"> <i class="lni lni-exit"></i> Sign Out </a> -->
                            <a href="#" onclick="logout()" id = 'logout'><img src="assets/sf/signout.svg" alt="">Logout</a>
                        </li>
                        </ul>
                    </div>
                    <!-- profile end -->
                    </div>
                </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->
<!-- =======delete modal======== -->
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Do yo really want to delete record ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-success">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- ===================== -->
        <!-- Starts of Content -->
        @yield('content')
        <!-- Ends of Contents -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">Copyright © 2023 Admin. All Rights Reserved</p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="terms d-flex justify-content-center justify-content-md-end">
                            <a href="#0" class="text-sm">Term & Conditions</a>
                            <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    
   
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/polyfill.js') }}"></script> -->
   
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}" ></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.2/js/bootstrap-multiselect.min.js" integrity="sha512-lxQ4VnKKW7foGFV6L9zlSe+6QppP9B2t+tMMaV4s4iqAv4iHIyXED7O+fke1VeLNaRdoVkVt8Hw/jmZ+XocsXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')


  </body>
</html>
<script>
 
 function logout() {
        // Assuming you're using jQuery
        $.ajax({
            url: '/logout', // Replace with your logout route
            type: 'GET', // or 'GET' depending on your logout route setup
            success: function(response) {
                // Redirect to login page after logout
                window.location.href = '/login'; // Replace with your login page URL
            }
        });
    }
  function deleteData(delurl){
    //alert(delurl);
    if(confirm("Are you very sure you want to delete this")){
      $.ajax({
          url: delurl,
          headers: { '_token': '{{csrf_token()}}' },
          type: "get",
          dataType: "json",
          success: function (data) {
            console.log(data);
            location.reload();
          },
          error: function() {
              return false;
          }
      });
    }
  }

  

	new DataTable('.datatable');

  function openUrl(url){
    var Url = url;
    var target = '__blank';
    window.open(Url,target);
  }
</script>
