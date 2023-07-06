<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
 <?php
 $regno;
 $data=DB::connection('mysql2')->select("select * from  `studentuser` where `REGNO`= '$regno' ");
// print_r($data);
$hii=json_encode($data);
$value= substr("$hii",1,-1);

$tokenOutput2 = json_decode($value);
$name  =$tokenOutput2->{'FULLNAME'};
$degree  =$tokenOutput2->{'DEGREE'};
$DEPARTMENT  =$tokenOutput2->{'AWARD'};
$SECTION  =$tokenOutput2->{'SECTION'};
$data1=DB::connection('mysql2')->select("select * from  `staffassi` where `sec`= '$SECTION' ");





?>


<center><table style="width:100%">
  <tr>
    <td style=""><img src="assets/img/dmi.png" style="width:150px;height:150px;margin-left:20px"></td>
    <td style=""><center><h3>ST. JOSEPH UNIVERISITY IN TANZANIA</h3><br>Dar es Salaam, Tanzania<br><br>HALL TICKET<br>
    <?php $url = "http://chart.apis.google.com/chart?cht=qr&chco=ddd&chs=100x100&chld=L|0&chl=" . $regno;
//echo the qr code
echo"</br>";
echo "<center><img src='$url'></center>";
 ?> 
  </center></td>
    <td > <div style="border:black solid 1px ;height:150px;width:150px;border-radius:20px"></div>

  </td>
  </tr>
</table></center>
<br>
<table style="">
<tr>
  <td>Candidate's Name</td>
  <td> : {{$name}}</td>
</tr>
<tr>
  <td>Programme</td>
  <td> : {{$DEPARTMENT}}</td>
</tr>
<tr>
  <td>Register Number</td>
  <td> : {{$regno}}</td>
</tr>
<tr>
  <td>Examination Center</td>
  <td>: St.Joseph College of Engineering and Technology,dar es Salam</td>
</tr>
<tr>
  <td>Center Code</td>
  <td>:</td>
</tr>

</table><br>

<center><p style="text-decoration:underline">SUBJECTS APPEARING</p></center><br>
<table style="width:100%;">
<tr style="border:black solid 1px">

 <td style="border:black solid 1px"><br><center> <?php    
 foreach($data1 as $ddd){
  echo $ddd->assimod."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

 }
 
 
 ?></center><br> <br></td>
 
</tr>
</table><br><br>

<table style="width:100%;">
<tr>
<td>Signature of the Candidate
</td>
<td><span style="float:right">Controller of Examinations</span></td>
</tr>
</table><br>
</body>
</html>



