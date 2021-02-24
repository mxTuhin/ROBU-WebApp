<?php

include('../config/dbConfig.php');
// include('sendMail.php');



$response = array();
// $emailFromLink="tuhinmridha11@gmail.com";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID=$_POST['row_id'];
    $name=$_POST['leadersName'];
    $cellnum=$_POST['Cellnum'];
    $segment=$_POST['pSegment'];

	    $updateQuery2="UPDATE intraSummer19 SET checked='checked' where id='$ID'";
	    mysqli_query($db, $updateQuery2);
	    $response['error'] = false;
		$response['msg']   = "Payment Confirmed";
		
		
		$nameT=explode(" ", $name);
		$user = $nameT[0];
		
		
		    
		
	echo json_encode($response);
}

?>