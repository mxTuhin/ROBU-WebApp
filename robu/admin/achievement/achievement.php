<?php
session_start();
include('../config/dbConfig.php');

if(isset($_POST['add_achievement'])){
    
        $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $image_id="";
        for($i=0; $i<6; $i++) {
            $image_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        
        
        $target_dir = "../assets/images/achievements/";
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
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            // echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_file)) {
                // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                
        
        
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        $year = $_POST['year'];
        $type = $_POST['type'];
        $teamName = $_POST['teamName'];
        
        $sql="INSERT INTO achievement (id, title, details, year, fileSource, type, teamName) VALUES(NULL, '$title', '$detail', '$year', '$file_name', '$type', '$teamName')";
        mysqli_query($db, $sql);
        
}
        }
}
?>