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

//var_dump($date);

$date1 = DateTime::createFromFormat('Y/m/d', $date);


//var_dump($date1);die;

// Output the date in a different format
$c_date_D= $date1->format('d');
$c_date_M= $date1->format('m');
$c_date_Y= $date1->format('y');

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

<h4 style='letter-spacing: 12px; font-size: 17px; margin-left: -190px; margin-top:218px;'>$c_date_D$c_date_M"."   &nbsp;  "." $c_date_Y "." </h4>
<br>
<h6 style='margin-left: -650px; margin-top:-45px; text-decoration: underline overline; line-height:-10px;'>$cross</h6>
<div>
<h4 style='margin-left: 276px; margin-top:320px; position: absolute; transform: rotate(270deg);  line-height:10px;  '>$payee</h4>
    </div>

<div>
<h5 style='width: 320px; margin-left:307px; line-height:20px; transform: rotate(270deg); position: absolute;   margin-top:320px;'>$amount_w Only</h5>
</div>
<div>
<h3  style='margin-left: 330px; position: absolute; transform: rotate(270deg); margin-top:-90px; margin-bottom:20px;'>**$amount_n**</h3>

</div>

<div style='    '>
<div >
<h5 style='margin-left: 377px; margin-top:-40px; transform: rotate(270deg);  position: absolute;'>HAWK HELMET COMPANY (PVT) LTD</h5>
</div>  
<div>
<h5 style='margin-left: 435px; margin-top:-70px; transform: rotate(270deg);  position: absolute;'>................................................................</h5>
</div>
<div>
<h6 style='margin-left: 450px; margin-top:-70px; transform: rotate(270deg);  position: absolute;'>MANAGER &nbsp;&nbsp;&nbsp; MANAGING DIRECTOR</h6>
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