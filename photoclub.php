<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Trendles-IIITK</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style_photo.css">
    </head>
<body>
    <div class="header">
        <h1>Photography Club</h1>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="section_a col-sm-6">
                <div class="title"><p>Image Upload</p></div>
                
                <form action="php/upload.php" method="post" enctype="multipart/form-data">
                Select image to upload: <input type="file" name="image"/> <br><br>
                Event: <input type="text" name="event" /> <br><br>
                <input type="submit" name="submit" value="UPLOAD"/>
                </form>
            </div>    
            <div class="section_a col-sm-6">
            <script>
            </script> 
            <?php
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
                    $result = $conn->query("select * from images");
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) {
                            echo '<img title="ffsaf" src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="175" height="200"/>';
                        }
                        //show image
                        // header("Content-type: image/jpg");
                        // echo $imgData['image'];
                    }
                    else {
                        echo "image not found";
                    }
                ?>
                <!-- <img src="php/view.php?id=1" width="175" height="200"/> -->
            </div>
        </div>    
    </div>
    
    
</body>
</html>