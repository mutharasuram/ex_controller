<?php error_reporting("0");
session_start();
if($_SESSION["userName"]==""){

  ?>
 <script> window.location.href='/';</script>
  <?php
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('layouts.includes.header') 
  <!-- ======= Header ======= -->
  <!-- End Header -->

<!-- End Sidebar-->

  <main id="" class="container-fluid">

    <div class="pagetitle">
      <h1></h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->
    <br><br><br><br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
@if (session('alert1'))
    <div class="alert alert-danger">
        {{ session('alert1') }}
    </div>
@endif

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <center>  <form class="row g-3  needs-validation"action="{{url('view_section')}}"method="post" novalidate>
            @csrf
              <div class="col-md-4">
            </div>
              <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">Approve:</label>
                  <select class="form-select" name="section" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach($view as $views)
                    <option>{{$views->SECTION}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a Section.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div></center>
                </form>
<br>
<br>

                <center>  <form class="row g-3  needs-validation"action="{{url('edit')}}"method="post" novalidate>
            @csrf
              <div class="col-md-4">
            </div>
              <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">View Hall Tickets:</label>
                  <select class="form-select" name="section" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach($view as $views)
                    <option>{{$views->SECTION}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a Section.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-warning" type="submit">View</button>
                </div></center>
                </form>

                <br>
<br>

                <center>  <form class="row g-3  needs-validation"action="{{url('excel')}}"method="post" novalidate>
            @csrf
              <div class="col-md-4">
            </div>
              <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">Generate Nominal Role:</label>
                  <select class="form-select" name="section" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach($view as $views)
                    <option>{{$views->SECTION}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a Section.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-warning" type="submit">Generate</button>
                </div></center>
                </form>
                <br>
<br>
<center>  <form class="row g-3  needs-validation"action="{{url('excel1')}}"method="post" novalidate>
            @csrf
              <div class="col-md-4">
            </div>
              <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">Nominal Role:</label>
                  <select class="form-select" name="section" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach($view as $views)
                    <option>{{$views->SECTION}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a Section.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-warning" type="submit">View</button>
                </div></center>
                </form>
                <br>
<br>

                <center>  <form class="row g-3  needs-validation"action="{{url('attendancc')}}"method="post" novalidate>
            @csrf
              <div class="col-md-4">
            </div>
              <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">View Attendance:</label>
                  <select class="form-select" name="section" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach($view as $views)
                    <option>{{$views->SECTION}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a Section.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-warning" type="submit">View</button>
                </div></center>
                </form>
                <br>
                <br>
                <center> <a href="staff_alert"class="btn btn-primary">Exam staff alert</a></center>




                <br>
                <hr>
<center>
                <a class="btn btn-warning" href="view_speal1">View Special Permission Student</a></center>



            </div>
          </div>
 
        </div>

        
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <!-- End Footer -->

 
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>