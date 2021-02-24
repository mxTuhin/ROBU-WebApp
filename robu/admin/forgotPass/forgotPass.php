<?php

include('../config/dbConfig.php');
session_start();

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	
	    $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0; $i<6; $i++) {
            $hash_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        
        $hash=md5($hash_id);


	$sql    = "UPDATE adminInfo SET hash='$hash' WHERE email='$email'";
	$result = mysqli_query($db, $sql);
	
	
	
	if ($result) {
			$response['error'] = false;
			$response['msg']   = "An Email has been sent to your account!";
			sendMail($email, $hash);
			
		
	} else {
		$response['error'] = true;
		$response['msg']   = "Sorry ! Email is not occupied to our Service";
	}
	
	echo json_encode($response);
}



function sendMail($email, $hash){
$to = $email;
$subject = "ROBU Web System | Password Recovery!";

$user = $name;

$htmlContent = '
    <html>
    <head>
        <title>ROBU Web System | Password Recovery</title>
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
                <b>Hello,</b>
                <br><br>
                Password Change requested
                <br><br>
                <a href="https://robulab.cf/admin/recoverPassword/?hash_id='.$hash.'&email='.$email.'" target="_blank"><button class="button">Recover password Here</button></a>
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