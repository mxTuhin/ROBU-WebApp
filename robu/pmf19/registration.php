<?php

include('../config/dbConfig.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
session_start();

$response = array();
$errors = array(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	$teamName = $_POST['teamName'];
	
	
	
	$leadersName = $_POST['leadersName'];
	$leadersEmail = $_POST['leadersEmail'];
	$leadersCellnum = $_POST['leadersCellnum'];
	$leadersDepartment = $_POST['leadersDepartment'];
	$leadersStudentID = $_POST['leadersStudentID'];
	
	$mOneName = $_POST['mOneName'];
	$mOneID = $_POST['mOneID'];
	$mOneCellnum = $_POST['mOneCellnum'];
	
	$mTwoName = $_POST['mTwoName'];
	$mTwoID = $_POST['mTwoID'];
	$mTwoCellnum = $_POST['mTwoCellnum'];
	
	$mThreeName = $_POST['mThreeName'];
	$mThreeID = $_POST['mThreeID'];
	$mThreeCellnum = $_POST['mThreeCellnum'];
	
	$ip=$_SERVER['REMOTE_ADDR'];
	
	
	
	
	
	$sql    = "SELECT * FROM pmf19 WHERE leadersEmail='$leadersEmail'";
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        	$response['error'] = true;
			$response['msg']   = "Team Leader with that email already Exists !";
	} else {
	    
	    $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0; $i<9; $i++) {
            $member_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        $hash=md5($member_id);

		$sql = "INSERT INTO pmf19 (id, teamName, leadersName, leadersEmail, leadersCellnum, leadersDepartment, leadersStudentID, mOneName, mOneID, mOneCellnum, mTwoName, mTwoID, mTwoCellnum, mThreeName, mThreeID, mThreeCellnum, segment ,ip) 
		VALUES (NULL,'$teamName', '$leadersName', '$leadersEmail', '$leadersCellnum', '$leadersDepartment', '$leadersStudentID', '$mOneName', '$mOneID', '$mOneCellnum', '$mTwoName', '$mTwoID', '$mTwoCellnum', '$mThreeName', '$mThreeID', '$mThreeCellnum', 'Project Manifestation' ,'$ip')";
		if (mysqli_query($db, $sql)) {
            
			sendMail($leadersEmail, $leadersName);
			
			
			$nameT=explode(" ", $leadersName);
			$user = $nameT[0];
            $username = "tuhinmridha";
            $password = "tuhin1234";
            $receiver = $leadersCellnum;                                              // 01xxxxxxxxx - for Single
            // $receiver = "(01xxxxxxxxx,01xxxxxxxxx,01xxxxxxxxx)";                    // (01xxxxxxxxx,01xxxxxxxxx,01xxxxxxxxx) - for Multiple
//            $sms_content = "Hello $user, Your registration for Graphics Designing Workshop || Fall - 19 || ROBU is successful. -ROBU";
            $sms_content = "Hello $user, Your registration is successful. Wait for the selection mail -ROBU";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://gosms.xyz/api/v1/sendSms",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('username' => $username,'password' => $password,'number' => $receiver,'sms_content' => $sms_content,'sms_type' => '1','masking' => 'non-masking'),
            ));
            $msg_response = curl_exec($curl);
            $err = curl_error($curl);
                        
            // echo $msg_response;
            curl_close($curl);
            
            $response['error'] = false;
			$response['msg']   = "Please Check Your SMS and Email for further Instruction";
			
			      
			
		} else {
// 			echo "Wrong Wrong Wrong";
	        $response['error'] = true;
			$response['msg']   = "Something Went Wrong";
		}
	}
	
	echo json_encode($response);
}


function sendMail($leadersEmail, $leadersName){
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
    $mail->addAddress($leadersEmail);
    $mail->addReplyTo('hello@robulab.org', 'Information');
//    $mail->addCC('info@example.com');
//    $mail->addBCC('info@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $message = '<html style="background-color:#F5F5F5; font-family:Tahoma, Geneva, sans-serif">';
    $message .= '<body style="padding:0"><div align="center">';
    $message .= '<h3 style="width:40%;background-color:#4CAF50;color:#FAFAFA;padding:30px;border-radius: 10px 10px 0px 0px;margin:0"> Registration Successful</h3>';
    $message .= '<div align="center"><p style="width:40%;background-color:#FAFAFA; margin:0;padding:30px;text-align:left">Hi <b>';
    $message .= $leadersName;
    $message .= ',</b><br><br>Congratulations!<br><br>Your registration is successful. Wait for the selection mail.<br>';
    $message .= '</div></div></body></html>';

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'ROBU | Registration Successful';
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
} catch (Exception $e) {
    
}

}


?>