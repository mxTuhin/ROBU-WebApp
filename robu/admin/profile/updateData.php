<?php

include('../config/dbConfig.php');
session_start();

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$memberID=$_POST['memberID'];
	$name=$_POST['name'];
    $emailF=$_POST['email'];
    $cellnum=$_POST['cellnum'];
    $bloodGroup=$_POST['bloodGroup'];
    $hobby=$_POST['hobby'];
    $interest=$_POST['interest'];
    $birthday=$_POST['birthday'];
    $fbID=$_POST['fbID'];
    $address=$_POST['address'];
    $aboutMe=$_POST['aboutMe'];
    $livingCountry=$_POST['livingCountry'];
    
    
    $sqlUp   = "UPDATE adminInfo SET name='$name', email='$emailF', cellnum='$cellnum', bloodGroup='$bloodGroup', hobby='$hobby', interest='$interest', birthday='$birthday', fbID='$fbID', address='$address', aboutMe='$aboutMe', livingCountry='$livingCountry'  WHERE memberID='$memberID'";
    $result2 = mysqli_query($db, $sqlUp);
    
	
	if ($result2) {

			$response['error'] = false;
			$response['msg']   = "Profile Updated Successfully!";
	} else {
		$response['error'] = true;
		$response['msg']   = "Something is Error";
	}
	
	echo json_encode($response);
}

?>