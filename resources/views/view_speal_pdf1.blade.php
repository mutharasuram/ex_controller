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
<br><br><br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
@if (session('alert1'))
    <div class="alert alert-success">
        {{ session('alert1') }}
    </div>
@endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Details</h5>
              
              <?php
              $userid=$_SESSION["userEmail"];
$sno=1;
$today=date('Y-m-d');
$use = DB::connection('mysql2')->table('special_permission')->orderBy('id', 'DESC')->get();
?>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Regno</th>
                    <th scope="col">Section</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Staffname</th>
                    <th scope="col">Date</th>
                    <th scope="col">File</th>
                    <th scope="col">Approve</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach($use as $use1)
                    <?php


                    ?>
                  <tr>
                    <th scope="row">{{$sno++}}</th>
                    <td>{{$use1->name}}</td>
                    <td>{{$use1->regno}}</td>
                    <td>{{$section=$use1->section}}</td>
                    <td>{{$use1->comment}}</td>
                    <td>{{$use1->staffname}}</td>
                    <td>{{$use1->date}}</td>
                    <td><a class="btn btn-warning" href="{{ url('view_speal_pdf', ['id' => $use1->id]) }}" target="_blank">View</a></td>
                    
                    <?php 
$data=DB::connection('mysql2')->select("select DISTINCT `regno` from  `student_fine` where `section`= '$section' and `status`!='' and `fine_details`='VOICE' ");
$hii=json_encode($data);
 $value= substr("$hii",1,-1);
              
                    
                    if($value!=""){ ?>
                    <td><span class="badge bg-success">Already Approved</span></td>
                    <?php
                    }else{
?>
<td>
<form action="spl_app"method="post"onSubmit="if(!confirm('Are You Approve This Data?')){return false;}">
@csrf
<input name="id"value="{{$use1->id}}" hidden>

<button class="btn btn-success" type="submit">Approve</button>
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
<script type="text/javascript">  
            function selects(){  
                var ele=document.getElementsByName('chk[]');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelect(){  
                var ele=document.getElementsByName('chk[]');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                      
                }  
            }             
        </script>  