<?php 

include_once 'plugin/dompdf1/dompdf_config.inc.php';
//$date=date("d m Y");
//$c_date = $date->format('Y-m-d');
//$da[te1 = $date->format('Y m d');
//$date1=date_format($c_date, 'Y-m-d');

//var_dump($a);die;
//var_dump($in_word);die;
//
//
$date1 = DateTime::createFromFormat('Y-m-d', $date);

// Output the date in a different format
$c_date_D= $date1->format('d');
$c_date_M= $date1->format('m');
$c_date_Y= $date1->format('Y');

//die;

if ($cross ==1) {
//    $cross = "";
    $cross = "<h4  style='text-decoration: underline'>A/C PAYEE ONLY</h4>";
}
elseif ($cross ==0) {
$cross="";
}


$amount_1 = $amount;
$amount_2 = $amount_cents;

$amount_n = $amount_1.'.'.$amount_2;

$amount_w = $in_word;

//var_dump($data1);die;
//var_dump($in_word);die;

$html="

<style type='text/css'>



h3.absolute {
	
	position: absolute;
	color:blue;
}

</style>

<body style='width: 700px; margin-top:-40px; transform: rotate(270deg); '>

<h4 style='letter-spacing: 12px; font-size: 17px; margin-left: -192px; margin-top:214px;'>$c_date_D&nbsp;$c_date_M$c_date_Y "." </h4>
<br>
<h6 style='margin-left: -350px; margin-top:-45px; text-decoration: underline overline; line-height:-10px;'>$cross</h6>
<div>
<h4 style='margin-left: 272px; margin-top:320px; position: absolute; transform: rotate(270deg);  line-height:10px;  '>$payee</h4>
    </div>

<div>
<h5 style='width: 320px; margin-left:302px; line-height:20px; transform: rotate(270deg); position: absolute;   margin-top:310px;'>$amount_w Only</h5>
</div>
<div>
<h3  style='margin-left: 330px; position: absolute; transform: rotate(270deg); margin-top:-90px; margin-bottom:20px;'>**$amount_n**</h3>

</div>

<div style='    '>
<div >
<h5 style='margin-left: 377px; margin-top:-70px; transform: rotate(270deg);  position: absolute;'>DEDIGAMA GROUP (PVT) LTD</h5>
</div>  
<div>
<h5 style='margin-left: 430px; margin-top:-70px; transform: rotate(270deg);  position: absolute;'>................................................................</h5>
</div>
<div>
<h6 style='margin-left: 445px; margin-top:-85px; transform: rotate(270deg);  position: absolute;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIRECTOR</h6>
</div>
</div>




</body>";
     
$dompdf = new DOMPDF();
$dompdf->load_html($html);
//$dompdf->set_paper( array(0,0, 12 * 72, 12 * 72), "portrait" ); // 12" x 12"
$dompdf->render();
$dompdf->stream("Cheque.pdf",
array("Attachment" => false));
exit(0);


?>


<?php
 include("foot.inc"); 
?>