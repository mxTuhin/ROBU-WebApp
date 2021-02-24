<?php
session_start();
include('../config/dbConfig.php');

if(isset($_POST['submit_music'])){
    
        $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0; $i<6; $i++) {
            $music_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        
        $email=$_SESSION['email'];
        $link = $_POST['link'];
        $newLink=str_replace("watch?v=","embed/","$link");
        
        $sql="INSERT INTO music (id, link, email, musicID) VALUES(NULL, '$newLink', '$email', '$music_id')";
        mysqli_query($db, $sql);
        
}
?>