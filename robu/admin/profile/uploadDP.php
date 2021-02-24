<html>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.7/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">

function myFn(){
        Swal.fire('Your Cover Has been Uploaded');
             
}

function myFnNotUploaded(){
        Swal.fire('Problem Uploading File!');
             
}

function myFnJPG(){
        Swal.fire('Only JPG/PNG/GIF is allowed');
             
}

function myFnLargeFile(){
        Swal.fire('File is too Large !');
             
}




</script>
</html>

<?php 

include('../config/dbConfig.php');
session_start();
    $errors = array(); 
    if(isset($_POST['uploadProfile'])){

        $email = $_SESSION['email'];
        
                                                                                //File Upload Starts Here :p
                                                                                
                                                                                
        $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0; $i<6; $i++) {
            $image_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        
        
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["fileToUploadT"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $new_file = $target_dir . $image_id . "." . $imageFileType;
        
        $file_name = $image_id . "." . $imageFileType;
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUploadT"]["tmp_name"]);
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
        if ($_FILES["fileToUploadT"]["size"] > 500000) {
            // echo "Sorry, your file is too large.";
            echo '<script type="text/javascript">
                myFnLargeFile();
                </script>';
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo '<script type="text/javascript">
                myFnJPG();
                </script>';
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUploadT"]["tmp_name"], $new_file)) {
                // echo "The file ". basename( $_FILES["fileToUploadT"]["name"]). " has been uploaded.";
                echo '<script type="text/javascript">
                myFn();
                </script>';

		$sql = "UPDATE adminInfo SET image='$file_name' WHERE email='$email'";
		if (mysqli_query($db, $sql)) {
		  //echo "Submitted";
		} else {
// 			echo "Wrong Wrong Wrong";
		}
	
                
            } else {
                // echo "Sorry, there was an error uploading your file.";
                // 	echo "not Uploaded";
                echo '<script type="text/javascript">
                myFnNotUploaded();
                </script>';
            }
        }                                                                              //File Upload Ends Here.. :p 
        header("Location: ../profile/");
    }
    

?>

    
