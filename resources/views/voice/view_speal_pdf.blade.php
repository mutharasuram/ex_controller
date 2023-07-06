<?php
 $hii=json_encode($view);
 $value= substr("$hii",1,-1);

$tokenOutput2 = json_decode($value);
$file=$tokenOutput2->{'file'};

 $pdfData = 'data:application/pdf;base64,' . $file;
 
echo '<iframe src="'.$pdfData.'" style="height:100%;width:100%;">';

?>