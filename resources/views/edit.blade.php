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
              <h5 class="card-title">{{$section}}</h5>

              
<?php
$sno=1;

$hii=json_encode($view);
$value= substr("$hii",1,-1);
//print_r($value);
if($value!=""){
?>


                    

             
              <table class="table table-bordered border-primary">
                <thead>
<tr>

<th scope="col">#</th>
<th scope="col">Name</th>
<th scope="col">Register no</th>

<th scope="col">Hall Ticket</th>
</tr>
                </thead>
                <tbody>
                    @foreach($view as $views)
                    @php
                    $regno=$views->regno;
                    $data=DB::connection('mysql2')->select("select * from  `studentuser` where `REGNO`= '$regno' ");
                   // print_r($data);
                   $hii=json_encode($data);
$value= substr("$hii",1,-1);

$tokenOutput2 = json_decode($value);
  $name  =$tokenOutput2->{'FULLNAME'}; 

@endphp
                  <tr>
                
                    <th scope="row">{{$sno++}}</th>
                    <td>{{$name}}</td>
                    <td>{{$views->regno}}</td>
                 
                    <td>
                      <form action="pdf" method="post">
                        @csrf
                        <input value="{{$views->regno}}" name="reg"hidden>
                    <button class="btn btn-success" type="submit">Download Hallticket</button>
</form>
</td>
                  </tr>
@endforeach
                </tbody>
              </table>
            


<?php

}else{
?>

<h1>No Data Found!</h1>

<?php

}
?>


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



