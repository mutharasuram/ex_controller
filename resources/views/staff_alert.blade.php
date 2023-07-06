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
<br><br>
  <main id="" class="container-fluid">

    <div class="pagetitle">
      <h1></h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->
    <br><br>
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
              <h5 class="card-title">Staff Alert</h5>

              
              <form class="row g-3 needs-validation" action="ins_staff_alert"method="post" novalidate>
                @csrf
                <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Date</label>
                  <input type="date" class="form-control" id="validationCustom03"name="date" required>
                  <div class="invalid-feedback">
                    Please provide a valid Date.
                  </div>
                </div>
                <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Exam Hall</label>
                  <input type="text" class="form-control" id="validationCustom03"name="hall" required>
                  <div class="invalid-feedback">
                    Please provide a Exam Hall.
                  </div>
                </div>
                <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Exam Name</label>
                  <input type="text" class="form-control" id="validationCustom03"name="exam_name" required>
                  <div class="invalid-feedback">
                    Please provide a Exam Name.
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">Section</label>
                  <select class="form-select" id="validationCustom04"name="section" required>
                    <option selected disabled value="">Choose...</option>
                    @foreach($view as $views)
                    <option>{{$views->SECTION}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid Staff.
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="validationCustom04" class="form-label">Staff</label>
                  <select class="form-select" id="validationCustom04" name="staff"required>
                    <option selected disabled value="">Choose...</option>
                    @foreach($view1 as $views1)
                    <option>{{$views1->staffname}}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid Staff.
                  </div>
                </div>
                
                
                <div class="col-12">
                <center>  <button class="btn btn-primary" type="submit">Submit</button></center>
                </div>
              </form>

<hr>
<h5 class="card-title">Details</h5>
<?php
$sno=1;
$today=date('Y-m-d');
$use = DB::connection('mysql2')->table('alert_exam_hall')->orderBy('id', 'DESC')->get();
?>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">Hall</th>
                    <th scope="col">Exam Date</th>
                    <th scope="col">Exam Name</th>
                    <th scope="col">Section</th>
                    <th scope="col">Module</th>
                    <th scope="col">Exam Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($use as $use1)
                  <tr>
                    <th scope="row">{{$sno++}}</th>
                    <td>{{$use1->staff_name}}</td>
                    <td>{{$use1->hall}}</td>
                    <td>{{$exdate=$use1->exam_date}}</td>
                    <td>{{$use1->exam_name}}</td>
                    <td>{{$use1->section}}</td>
                    <td>{{$use1->module}}</td>
                    <td>{{$use1->exam_date}}</td>
                    <?php if($exdate <= $today){ ?>
                    <td><span class="badge bg-success">Exam Already Finished</span></td>
                    <?php
                    }else{
?>
<td>
<form action="data_delete"method="post"onSubmit="if(!confirm('Are You Delete This Data?')){return false;}">
@csrf
<input name="id"value="{{$use1->id}}" hidden>

<button class="btn btn-danger" type="submit">Delete</button>
                    </form>

</td>
<?php

                    }
                    ?>
                  </tr>
                 @endforeach
                </tbody>
              </table>



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



