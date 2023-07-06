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
@include('layouts.includes.voiceincludes.header')  
  <!-- ======= Header ======= -->
  <!-- End Header -->

<!-- End Sidebar-->

  <main id="" class="container-fluid">

    <div class="pagetitle">
      <h1></h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->
<br><br><br>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">APPROVE</h5>

              <?php
               $hii=json_encode($view);
               $value= substr("$hii",1,-1);
               $tokenOutput2 = json_decode($value);
               $name=$tokenOutput2->{'FULLNAME'}; 
               $REGNO=$tokenOutput2->{'REGNO'}; 
               $section=$tokenOutput2->{'SECTION'}; 
               $AWARD=$tokenOutput2->{'AWARD'}; 

               ?>
             
<div class="row">
<div class="col-sm-4">
<b><p>Name:</p>
<p>Register No:</p>
<p>Section:</p>
<p>Department:</p></b>
</div>
<div class="col-sm-4">
<p>{{$name}}</p>
<p>{{$REGNO}}</p>
<p>{{$section}}</p>
<p>{{$AWARD}}</p>

</div>

</div>
         


<center>             
<form class="row g-3 needs-validation"action="upload"method="post" enctype="multipart/form-data"novalidate>
@csrf
<input name="name"value="{{$name}}"hidden>
<input name="regno"value="{{$REGNO}}"hidden>
<input name="section"value="{{$section}}"hidden>

<div class="col-md-4">
                  <label for="validationCustom03" class="form-label">Comments</label>
                  <textarea type="text" class="form-control" name="Commands" id="validationCustom03" required></textarea>
                  <div class="invalid-feedback">
                    Please provide a Commands.
                  </div>
                </div>
                
                <div class="col-md-4">
                  <label for="validationCustom03" class="form-label">Attach File</label>
                  <input type="file" class="form-control" name="file" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please Attach File.
                  </div>
                </div>            
                
                
                <br>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Approve</button>
                </div>
                
</form>    </center>    


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
