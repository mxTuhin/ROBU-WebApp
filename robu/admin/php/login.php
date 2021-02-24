<?php

include('../config/dbConfig.php');
session_start();

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$pass     = $_POST['password'];
	$sql="";



	$sql    = "SELECT * FROM adminInfo WHERE email='$email' AND approval='approved'";
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) == 1) {
		
		$data = mysqli_fetch_assoc($result);
		
		$password = md5($pass);
		
		if ($data['password'] == $password) {
			$response['error'] = false;
			$response['msg']   = "Login Successful!";
			$_SESSION['email']=$email;
			$_SESSION['loginAuthenticator']="adminAuthenticated";
			
			
		} else {
			$response['error'] = true;
			$response['msg']   = "Username/Password mismatch.";
		}
	} else {
		$response['error'] = true;
		$response['msg']   = "Account Not Approved. Please Wait or Contact the Admin";
	}
	
	echo json_encode($response);
}

?>