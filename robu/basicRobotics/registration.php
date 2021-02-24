<?php 

include('../config/dbConfig.php');

    $errors = array(); 
    if(isset($_POST['registerAdmin'])){
        
        
        $name = $_POST['name'];
        $studentID = $_POST['studentID'];
        $gender = $_POST['gender'];
        $bracuDepartment = $_POST['bracuDepartment'];
        $admissionSemester = $_POST['admissionSemester'];
        $rsInfo = $_POST['rsInfo'];
        $bloodGroup = $_POST['bloodGroup'];
        $address = $_POST['address'];
        $fbID = $_POST['fbID'];
        $cellnum = $_POST['cellnum'];
        $email = $_POST['email'];
        
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
        
        $ip=$_SERVER['REMOTE_ADDR'];
        
        $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0; $i<32; $i++) {
            $hash_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        $hash=md5($hash_id);
        
        
        $sql = "INSERT INTO basicRobotics (id, name, studentID, gender, bracuDepartment, admissionSemester, rsInfo, bloodGroup, address, fbID, cellnum, email, ip, courseSemester) 
		VALUES (NULL,'$name','$studentID','$gender','$bracuDepartment', '$admissionSemester', '$rsInfo', '$bloodGroup', '$address', '$fbID', '$cellnum', '$email', '$ip', '$joiningSemester')";
		mysqli_query($db, $sql);
		sendMail($email, $name);
		
		
		$nameT=explode(" ", $name);
		$user = $nameT[0];
		
		
		    
		
        header('Location: ../successB/');
    
    }
    

function sendMail($email, $name){
$to = $email;
$subject = "Thank You for getting registered for Basic Robotics | Summer 19!";

$user = $name;

$htmlContent = '
    <html>
    <head>
        <title>Thank You for getting registered for Basic Robotics | Summer 19</title>
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
                Your Registration for Basic Robotics is complete. Please Complete Payment if you had not already
                
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