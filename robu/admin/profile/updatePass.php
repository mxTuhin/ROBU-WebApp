<?php

include('../config/dbConfig.php');
session_start();

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$passOne = $_POST['passOne'];
	$passTwo = $_POST['passTwo'];
	$passOld = md5($_POST['passOld']);
	$email=$_SESSION['email'];
	$password=md5($passOne);
	
	$sql    = "SELECT * FROM adminInfo WHERE email='$email'";
	$result = mysqli_query($db, $sql);
	$data=mysqli_fetch_assoc($result);
	$name=$data['name'];
	$fetchedPass=$data['password'];
	

	if($fetchedPass != $passOld){
	    $response['error'] = true;
		$response['msg']   = "Previous Password Dont match";
	}
	
	else if($passOne != $passTwo){
	    $response['error'] = true;
		$response['msg']   = "You are proceeding some unfair means. For security reason your IP has been logged";
		$ip=$_SERVER['REMOTE_ADDR'];
		$sqlIP    = "UPDATE adminInfo SET safetyIP='$ip' WHERE email='$email'";
	    mysqli_query($db, $sqlIP);
	}
	else{


    $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for($i=0; $i<32; $i++) {
        $hash_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
    }
        
    $updateHash=md5($hash_id);
        
	$sql    = "UPDATE adminInfo SET password='$password' WHERE email='$email'";
	$result = mysqli_query($db, $sql);
	
	
	
	if ($result) {
			$response['error'] = false;
			$response['msg']   = "An Email has been sent to your account!";
			sendMail($email, $name);
			
		
	} else {
		$response['error'] = true;
		$response['msg']   = "Sorry ! Something Went Wrong";
	}
	
	}
	echo json_encode($response);
}



function sendMail($email, $name){
$to = $email;
$subject = "ROBU Web System | Password Changed!";

$user = $name;

$htmlContent = '
    <html>
    <head>
        <title>ROBU Web System | Password Changed</title>
        <style>
        .button {
          background-color: #4CAF50;
          border: none;
          color: white;
          padding: 15px 25px;
          text-align: center;
          font-size: 16px;
          cursor: pointer;
        }
        
        .button:hover {
          background-color: green;
        }
        </style>
    </head>
    <body>
        <div align="center">
            <img src="https://robulab.cf/assets/favicon.png" style="padding:20px; height:50px">
            <hr>
        </div>
        <div style="padding:20px;">
            <p>
                <b>Hello '.$name.',</b>
                <br><br>
                Your Password Has been reset ! Now You can Login Here
                <br><br>
                <a href="https://robulab.cf/admin/" target="_blank"><button class="button">Login Here</button></a>
                <br><br>
                Thanks
                <br>
                ROBU Web System Team
            </p>
        </div>
    </body>
</html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: ROBU LAB<mail@mtuhin.me>' . "\r\n";
//$headers .= 'Cc: welcome@example.com' . "\r\n";
//$headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
if(mail($to,$subject,$htmlContent,$headers)):
    $successMsg = 'Email has sent successfully.';
else:
    $errorMsg = 'Email sending fail.';
endif;

}

?>