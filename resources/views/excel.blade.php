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


  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"> 
  <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet" >
  

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


                    

             
              <table id="example" class="display nowrap" style="width:100%">
                <thead>
<tr>

<th scope="col">#</th>
<th scope="col">Name</th>
<th scope="col">Register no</th>
<th scope="col">Section</th>
<th scope="col">Depatrment</th>
<th scope="col">Eligible Module</th>
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
  $dep  =$tokenOutput2->{'AWARD'};
  $data1=DB::connection('mysql2')->select("select DISTINCT`assimod` from  `staffassi` where `sec`= '$section' ");
@endphp
                  <tr>
                
                    <th scope="row">{{$sno++}}</th>
                    <td>{{$name}}</td>
                    <td>{{$regno=$views->regno}}</td>
                    <td>{{$section}}</td>
                    <td>{{$dep}}</td>
                    <td>
                    <?php    
 foreach($data1 as $ddd){
  $moduleee=$ddd->assimod;
  $data33=DB::connection('mysql2')->select("select DISTINCT`internal` from  `coeinternals` where `regno`= '$regno' and `section`='$section' and `module`='$moduleee' and `status`='Published' ");
  
  //print_r($data33);
  $internal=$data33[0]->internal;
   echo $moduleee."=".$internal."<br>";


 }
 
 
 ?></td>

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


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
    } );
} );</script>
</body>

</html>
