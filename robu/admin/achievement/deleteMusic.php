<?php

include('../config/dbConfig.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $musicID=$_POST['row_id'];

    
	    $updateQuery2="DELETE FROM music where musicID='$musicID'";
	    if(mysqli_query($db, $updateQuery2)){
	        $response['error'] = false;
		    $response['msg']   = "The Item is being Deleted";
	    }

	
	else{
	    $response['error'] = true;
		$response['msg']   = "Something Went Wrong";
	}

	echo json_encode($response);
}

?>