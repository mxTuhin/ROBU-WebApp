<?php

$server_address = "";              	//If you connecting remotely to this database you need to set the hostname of your server and you need to allow access to your ip from server 
$database_name = "";   	    //Set your database name
$username = "";		    //Set your database username
$password = "";		    //Set database password
    
  
// Create connection
$db = new mysqli($server_address, $username, $password, $database_name);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
session_start();

$response = array();
$errors = array(); 

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
	
	
	
	
	
	$sql    = "SELECT * FROM memberInfo WHERE mailStatus=''";
	$result = mysqli_query($db, $sql);
	
	while($data = mysqli_fetch_array($result)){
        
        $email=$data['email'];
        $name=$data['name'];
        $hash=$data['hash'];
        $member_id=$data['memberID'];
        $cellnum=$data['cellnum'];
        sendMail($email, $name, $hash, $member_id);
        
        $query="UPDATE memberInfo set mailStatus='sent' where memberID='$member_id'";
        
        
        
        mysqli_query($db, $query);
        
//        echo $email ." - ". $name ." - " . $hash ." - ". $member_id ." - ";
	}
	
//	echo json_encode($response);
                                              



function sendMail($email, $name, $hash, $member_id){
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                                   // Enable verbose debug output
    $mail->isSMTP();                                                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                                                 // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                               // Enable SMTP authentication
    $mail->Username   = 'roboticsclubbracu@gmail.com';                             // SMTP username
    $mail->Password   = 'Robulab123';                                                 // SMTP password
    $mail->SMTPSecure = 'TLS';                                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                                // TCP port to connect to

    //Recipients
    $mail->setFrom('hello@robulab.org', 'ROBU LAB');
    $mail->addAddress($email);
    $mail->addReplyTo('hello@robulab.org', 'Information');
//    $mail->addCC('info@example.com');
//    $mail->addBCC('info@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $message = '<html style="background-color:#F5F5F5; font-family:Tahoma, Geneva, sans-serif">';
    $message .= '<body style="padding:0"><div align="center">';
    $message .= '<h3 style="width:40%;background-color:#4CAF50;color:#FAFAFA;padding:30px;border-radius: 10px 10px 0px 0px;margin:0">Success! Registration Initiated</h3>';
    $message .= '<div align="center"><p style="width:40%;background-color:#FAFAFA; margin:0;padding:30px;text-align:left">Hi <b>';
    $message .= $name;
    $message .= ',</b><br><br>Congratulations!<br><br>You have succesfully initiated your registration process.<br><br>Please follow the link below to complete registration. Thank you!</p>';
    $message .='<br><br>
                <a href="http://robulab.org/registration/?h='.$hash.'&id='.$member_id.'" target="_blank"><button style="background-color: #4CAF50;
          border: none;
          color: white;
          padding: 15px 25px;
          text-align: center;
          font-size: 16px;
          cursor: pointer;">Complete Registration Here</button></a>';
    $message .= '</div></div></body></html>';

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'ROBU | Complete Registration';
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
} catch (Exception $e) {
    
}

}


?>