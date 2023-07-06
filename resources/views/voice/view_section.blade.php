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
<br><br>
  <main id="" class="">

    <div class="pagetitle">
      <h1></h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->
    <br><br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$section}}</h5>
              <form action="insert_no1"method="post">
                @csrf
              <input type="button"class="btn btn-success" onclick='selects()' value="Select All"/>  
        <input type="button"class="btn btn-danger" onclick='deSelect()' value="Deselect All"/> 

              <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                  <th scope="col">#</th>
                    <th scope="col">Sno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Regno</th>
                    <th scope="col">Batch</th>
                    <th scope="col">YOS</th>
                    <th scope="col">Accountend Status</th>
                    <th scope="col">HOD Status</th>
                    <th scope="col">Deen of Student Status</th>
                  </tr>
                </thead>
                <tbody>
                    @php $sno=1;
                    @endphp
                    @foreach($view as $views)
                    @php
                    $email=$views->REGNO;
                    @endphp
<?php
$data=DB::connection('mysql2')->select("select DISTINCT `name` from  `student_fine` where `regno`= '$email' and `section`='$section' and `fine_details`='ACCOUNT' ");
$data1=DB::connection('mysql2')->select("select DISTINCT `name` from  `student_fine` where `regno`= '$email' and `section`='$section' and `fine_details`='HOD' ");
$data2=DB::connection('mysql2')->select("select DISTINCT `name` from  `student_fine` where `regno`= '$email' and `section`='$section' and `fine_details`='DEEN' ");
//print_r($data);
$hii=json_encode($data);
$value= substr("$hii",1,-1);

$tokenOutput2 = json_decode($value);
 $name  =$tokenOutput2->{'name'}; 

 $hii1=json_encode($data1);
$value1= substr("$hii1",1,-1);

$tokenOutput21 = json_decode($value1);
 $name1  =$tokenOutput21->{'name'}; 

 $hii12=json_encode($data2);
 $value12= substr("$hii12",1,-1);
 
 $tokenOutput22 = json_decode($value12);
  $name12  =$tokenOutput22->{'name'}; 
?>
                  <tr>
                 <th> <input type="checkbox" name="chk[]" value="{{$views->id}}"
                 <?php if($name12==""){ ?>  disabled  <?php } ?>>
                 
                </th>
                    <th scope="row">{{$sno++}}</th>
                    <td>{{$views->FULLNAME}}</td>
                    <td>{{$views->REGNO}}</td>
                    <td>{{$views->BATCH}}</td>
                    <td>{{$views->YOS}}</td>
                    <td><?php if($name!=""){?> <span style="background-color:green;color:white">Approve</span> <?php }else{?> <span style="background-color:red;color:white">Not Approve</span> <?php }  ?></td>
                    <td><?php if($name1!=""){?> <span style="background-color:green;color:white">Approve</span> <?php }else{?> <span style="background-color:red;color:white">Not Approve</span> <?php }  ?></td>
                    <td><?php if($name12!=""){?> <span style="background-color:green;color:white">Approve</span> <?php }else{?> <span style="background-color:red;color:white">Not Approve</span> <?php }  ?></td>
                  
                  </tr>
                @endforeach
                
                  </tbody>
                 
              </table>
              <?php
              if($email!=""){
                ?>

              <button class="btn btn-primary" type="submit">Submit</button>
              <?php }
              ?>
</form>
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

<html>  
<head>  
        
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
  
  
    
    
    
         
      
