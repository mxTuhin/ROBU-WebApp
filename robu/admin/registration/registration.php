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
        $hobby = $_POST['hobby'];
        $interest = $_POST['interest'];
        $address = $_POST['address'];
        $fbID = $_POST['fbID'];
        $cellnum = $_POST['cellnum'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $birthday = $_POST['birthday'];
        $robuDepartment = $_POST['robuDepartment'];
        $clubPosition = $_POST['clubPosition'];
        
        $ip=$_SERVER['REMOTE_ADDR'];
        
//         $sql = "INSERT INTO adminInfo ( name, studentID, gender, bracuDepartment, admissionSemester, rsInfo, bloodGroup, hobby, interest, address, fbID, cellnum, email, password, image) 
// 		VALUES ('$name','$studentID','$gender','$bracuDepartment', '$admissionSemester', '$rsInfo', '$bloodGroup', '$hobby', '$interest', '$address', '$fbID', '$cellnum', '$email', '$password', '$image_id')";
// 		mysqli_query($db, $sql);

    // }
        
                                                                                //File Upload Starts Here :p
                                                                                
                                                                                
        $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $image_id="";
        for($i=0; $i<6; $i++) {
            $image_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        
        
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $new_file = $target_dir . $image_id . "." . $imageFileType;
        
        $file_name = $image_id . "." . $imageFileType;
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            // echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_file)) {
                // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                
                
                // echo $firstName;
                // echo $surname;
                // echo $email;
                // echo $pass;
                // echo $fileName;
                
                
                   
    $sql    = "SELECT * FROM adminInfo WHERE email='$email'";
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) > 0) {
// 		echo "User already Exists";
	} else {
		$password = md5($pass);
		
		$sql = "INSERT INTO adminInfo (id, name, studentID, gender, bracuDepartment, admissionSemester, rsInfo, bloodGroup, hobby, interest, address, fbID, cellnum, email, password, image, ip, birthday, robuDepartment, clubPosition) 
		VALUES (NULL,'$name','$studentID','$gender','$bracuDepartment', '$admissionSemester', '$rsInfo', '$bloodGroup', '$hobby', '$interest', '$address', '$fbID', '$cellnum', '$email', '$password', '$file_name', '$ip', '$birthday', '$robuDepartment', '$clubPosition')";
		if (mysqli_query($db, $sql)) {
//		    echo"Successfull";
			sendMailSupplier($email, $name);
			sendMail($email, $name);
			
			
    
  	
  	
  	
            

		} else {
// 			echo "Wrong Wrong Wrong";
		}
	}
                
            } else {
                // echo "Sorry, there was an error uploading your file.";
                // 	echo "not Uploaded";
            }
        }                                                                              //File Upload Ends Here.. :p 
    }
    

function sendMailSupplier($email, $name){
$to = $email;
$subject = "Welcome to ROBU Web System!";

$user = $name;

$htmlContent = '
    <html>
    <head>
        <title>Welcome to ROBU Web System</title>
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
                Thank you for registering with ROBU Web System
                <br><br>
                <a href="https://robulab.cf/admin/" target="_blank"><button class="button">Login Here</button></a>
                <br><br>
                Your email is: '. $email .'
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

function sendMail($email, $name){
$to = "tuhinmridha11@gmail.com";
$subject = "Welcome to ROBU Web System!";

$user = $name;

$htmlContent = '
    <html>
    <head>
        <title>Welcome to ROBU Web System</title>
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
                <b>A use named '.$name.' has requested to Get admin access</b>
                
                <a href="https://robulab.cf/admin/" target="_blank"><button class="button">Login Here</button></a>
                <br><br>
                his email is: '. $email .'
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