<?php

include('../../config/dbConfig.php');
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
	
	$ip=$_SERVER['REMOTE_ADDR'];
	
	
	
	
	
	$sql    = "SELECT * FROM intraSummer19 WHERE leadersEmail='$leadersEmail'";
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

		$sql = "INSERT INTO intraSummer19 (id, teamName, leadersName, leadersEmail, leadersCellnum, leadersDepartment, leadersStudentID, mOneName, mOneID, mOneCellnum, mTwoName, mTwoID, mTwoCellnum, segment ,ip) 
		VALUES (NULL,'$teamName', '$leadersName', '$leadersEmail', '$leadersCellnum', '$leadersDepartment', '$leadersStudentID', '$mOneName', '$mOneID', '$mOneCellnum', '$mTwoName', '$mTwoID', '$mTwoCellnum', 'Project Showcasing' ,'$ip')";
		if (mysqli_query($db, $sql)) {
            $response['error'] = false;
			$response['msg']   = "Please Check Your SMS and Email for further Instruction";
			sendMail($leadersEmail, $leadersName);
			
			
			$nameT=explode(" ", $leadersName);
			$user = $nameT[0];
			
			$emailN=explode("@", $email);
			

            
            $username = "tuhinmridha";
            $password = "tuhin1234";
            $receiver = $leadersCellnum;                                              // 01xxxxxxxxx - for Single
            // $receiver = "(01xxxxxxxxx,01xxxxxxxxx,01xxxxxxxxx)";                    // (01xxxxxxxxx,01xxxxxxxxx,01xxxxxxxxx) - for Multiple
            $sms_content = "Hello $user, Your Registration for Project Showcasing is successful.";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://portal.pairsms.com/api/v1/sendSms",
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
            
            
            
			
		} else {
// 			echo "Wrong Wrong Wrong";
	        $response['error'] = true;
			$response['msg']   = "Something Went Wrong";
		}
	}
	
	echo json_encode($response);
}


function sendMail($leadersEmail, $leadersName){

$to = $leadersEmail;
$subject = "ROBU | Complete Registration";

$user = $leadersName;

$htmlContent = '
    <html>
    <head>
        <title>ROBU | Complete Registration</title>
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
                <b>Welcome '.$user.',</b>
                <br><br>
                Thank you for getting Registered to the Intra University Tech Carnival Summer-19<br>Organized By Robotics Club of BRAC University
                
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