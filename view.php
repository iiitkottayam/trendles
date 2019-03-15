<?php
if(!empty($_GET['id'])){
    //DB details
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = 'mypass';
    $dbName = 'photos';

    //creating connection
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    
    //check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    //get image
    $result = $conn->query("select image from images where id = {$_GET['id']}");
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();

        //show image
        header("Content-type: image/jpg");
        echo $imgData['image'];
    }
    else {
        echo "image not found";
    }
}
?>