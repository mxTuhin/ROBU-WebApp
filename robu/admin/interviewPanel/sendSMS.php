<?php

include('../config/dbConfig.php');
session_start();

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$studentID=$_POST['studentID'];
    $query="UPDATE memberInfo SET mailStatus='' where studentID='$studentID'";
    $data=mysqli_query($db, $query);

	if ($data) {

			$response['error'] = false;
			$response['msg']   = "SMS and Email Sent to the Student!";
	} else {
		$response['error'] = true;
		$response['msg']   = "Something is Error";
	}
	
	echo json_encode($response);
}


?>