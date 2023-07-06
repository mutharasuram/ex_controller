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
@include('layouts.includes.accountincludes.header') 
  <!-- ======= Header ======= -->
  <!-- End Header -->

<!-- End Sidebar-->

  <main id="" class="">

    <div class="pagetitle">
      <h1></h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$section}}</h5> 

              <form action="insert_no4"method="post">
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
                    <th scope="col">DUE</th>
                    
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
 //   $email=21171356002;
  
  $data=DB::connection('mysql3')->select("select * from  `tempdailyaccount` where `Registerno`='$email' and `status`='Approved'");
  
  
  $query = DB::connection('mysql3')->select("SELECT tempdailyaccount.Registerno, SUM(Paid) As total ,tempdailyaccount.Particulars,accountcode.Name,accountcode.cash,tempdailyaccount.status FROM tempdailyaccount,accountcode WHERE accountcode.Name=tempdailyaccount.Particulars AND  tempdailyaccount.Particulars!='Refund Of Excess Fees' AND accountcode.cash='credit' AND tempdailyaccount.status ='Approved' and tempdailyaccount.Registerno='$email'"); 
  $sum=0;
  $total1=0;
  $total2=0;
  $total3=0;
  $total4=0;
  $total5=0;
  $total6=0;
  $total9=0;
  $total8=0;
  foreach($query as $querys){
    
    $b=$querys->Registerno;
   $c= $querys->total;
    $d=$querys->Particulars;
  
    $sum+=$c;
    $query25 = DB::connection('mysql3')->select("SELECT tempdailyaccount.Studentname,tempdailyaccount.Batch,tempdailyaccount.Course,tempdailyaccount.Registerno, tempdailyaccount.Department, SUM(Paid) As dtotal ,tempdailyaccount.Particulars,tempdailyaccount.status FROM tempdailyaccount WHERE  tempdailyaccount.Particulars='Refund Of Excess Fees' AND tempdailyaccount.status ='Approved' AND tempdailyaccount.Registerno='$b'");
    $tokenOutput = json_encode($query25);
    $tokenOutput1=substr("$tokenOutput",1,-1);
   $tokenOutput2 = json_decode($tokenOutput1);
    $tokenOutput2;
  
    $dtotal=$tokenOutput2->{'dtotal'}; 
    $query12 =DB::connection('mysql3')->select("SELECT SUM(studentfee) As sttotal from feestr WHERE regno='$b'");
    $tokenOutput11 = json_encode($query12);
    $tokenOutput22=substr("$tokenOutput11",1,-1);
   $tokenOutput33 = json_decode($tokenOutput22);
    $tokenOutput33;
  
    $sttotal=$tokenOutput33->{'sttotal'};
    $total1+=$sttotal;
  
    $query13 =DB::connection('mysql3')->select("SELECT SUM(hsfee) As hstotal from feestr WHERE regno='$b'");
    $tokenOutput111 = json_encode($query13);
    $tokenOutput221=substr("$tokenOutput111",1,-1);
   $tokenOutput331 = json_decode($tokenOutput221);
    $tokenOutput331;
  
    $hstotal=$tokenOutput331->{'hstotal'};
    $total2+=$hstotal;
    
    $query1 =DB::connection('mysql3')->select("SELECT SUM(total) As mtotal from feestr WHERE regno='$b'");
    $tokenOutput1111 = json_encode($query1);
    $tokenOutput2211=substr("$tokenOutput1111",1,-1);
   $tokenOutput3311 = json_decode($tokenOutput2211);
    $tokenOutput3311;
  
    $mtotal=$tokenOutput3311->{'mtotal'};
    $total3+=$mtotal;
  
  
    $query11 =DB::connection('mysql3')->select("SELECT tempdailyaccount.Registerno,tempdailyaccount.Department, SUM(Paid) As totalhs,tempdailyaccount.Particulars FROM tempdailyaccount WHERE   tempdailyaccount.Particulars='Tuition Fees - HESLB' AND tempdailyaccount.status ='Approved'  AND tempdailyaccount.Registerno='$b'");
    $tokenOutput11111 = json_encode($query11);
    $tokenOutput22111=substr("$tokenOutput11111",1,-1);
   $tokenOutput33111 = json_decode($tokenOutput22111);
    $tokenOutput33111;
  
    $hspaid=$tokenOutput33111->{'totalhs'};
    $total4+=$hspaid;
  
    $stupaid=$hspaid-$c;
    $total5+=$stupaid;
     $stpaid=abs($stupaid);
  
     $total6+=$c;
  
     $ssetotal=$stpaid-$dtotal;
  $stuudue=$sttotal-$ssetotal;
  
  if($stuudue<0)
  {
     $stuuduen='0';
  }
  else
  {
   $stuudue;
  $total8+=$stuudue;
  }
  
  
  $hsdue=$hstotal-$hspaid;
  
  $total9+=$hsdue;
  
  $duee=$stuudue+$hsdue;
  
    $duee;
  
  }
  ?>
                  <tr>
                 <th> <input type="checkbox" name="chk[]" value="{{$views->id}}" 
                 <?php if($duee > "0"){ ?>  disabled  <?php } ?>>
                 
                </th>
                    <th scope="row">{{$sno++}}</th>
                    <td>{{$views->FULLNAME}}</td>
                    <td>{{$views->REGNO}}</td>
                    <td>{{$views->BATCH}}</td>
                    <td>{{$views->YOS}}</td>
                    <td><?php echo $duee;?></td>
                    
                  </tr>
                @endforeach
                
                  </tbody>
                 
              </table>
              <button class="btn btn-primary" type="submit">Submit</button>
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
  
  
    
    
    
         
      
