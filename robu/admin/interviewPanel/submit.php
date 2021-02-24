<?php

include('../config/dbConfig.php');
session_start();

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$robuDepartment = $_POST['robuDepartment'];
	$remarks    = $_POST['remarks'];
	$userID=$_POST['studentID'];
	$status=$_POST['status'];
    
	$name=$_POST['name'];
    $emailF=$_POST['email'];
    $cellnum=$_POST['cellnum'];
    $bracuDepartment=$_POST['bracuDepartment'];
    $admissionSemester=$_POST['admissionSemester'];
    $bloodGroup=$_POST['bloodGroup'];
    $rsInfo=$_POST['rsInfo'];
    $hobby=$_POST['hobby'];
    $interest=$_POST['interest'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $fbID=$_POST['fbID'];
    $address=$_POST['address'];
    $studentID=$_POST['studentID'];
    
    
    
	$email=$_SESSION['email'];
    
    
    $joiningSemester="";
	date_default_timezone_set("Asia/Dhaka");
	$month=date('m');
	$year=date('y');
	if($month<4){
	    $joiningSemester="Spring-".$year;
	}
	else if($month<8){
	    $joiningSemester="Summer-".$year;
	}
	else if($month<12){
	    $joiningSemester="Fall-".$year;
	}



	$sql    = "UPDATE memberInfo SET robuDepartment='$robuDepartment', interviewer='$email', remarks='$remarks', status='$status'  WHERE studentID='$userID'";
    
    $sqlUp   = "UPDATE memberInfo SET name='$name', email='$emailF', cellnum='$cellnum', bracuDepartment='$bracuDepartment', admissionSemester='$admissionSemester', bloodGroup='$bloodGroup', rsInfo='$rsInfo', hobby='$hobby', interest='$interest', gender='$gender', birthday='$birthday', fbID='$fbID', address='$address', joiningSemester='$joiningSemester'  WHERE studentID='$userID'";
	$result = mysqli_query($db, $sql);
    $result2 = mysqli_query($db, $sqlUp);
    
	
	if ($result) {

			$response['error'] = false;
			$response['msg']   = "User Entry Succesfull!";
	} else {
		$response['error'] = true;
		$response['msg']   = "Something is Error";
	}
	
	echo json_encode($response);
}

?>