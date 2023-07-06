

  
<style>
@media print
{    
    #no-print,.no-print, .no-print *
    {
        display: none !important;
    }
}


</style>



<header id="header" class="header fixed-top d-flex align-items-center"id="no-print">

    <div class="d-flex align-items-center justify-content-between ">
      <a  class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block"><h4>Exam Controller</h4></span>
      </a>
      <i class=""></i>
    </div><!-- End Logo -->
<!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon">
            <i class=""></i>
          </a>
        </li><!-- End Search Icon-->

      <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/logo1.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block  ps-2"></span>
          </a><!-- End Profile Iamge Icon -->

          <!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
          <a href="{{url('dashboard')}}"style="color:black"> HOME</a>
          </a><!-- End Profile Iamge Icon -->

          <!-- End Profile Dropdown Items -->
        </li>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
           <a href="{{url('logout')}}"style="color:black"> <span class="d-none d-md-block  ps-2">LOGOUT</span></a>
          </a><!-- End Profile Iamge Icon -->

          <!-- End Profile Dropdown Items -->
        </li>
      </ul>
    </nav><!-- End Icons Navigation -->

  </header>