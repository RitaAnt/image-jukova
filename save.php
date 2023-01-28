<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'Juckova';

//Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }

        $dateTime = date("Y-m-d H:i:s");

//Insert image content into database
        $insert = $db->query("INSERT into images (image,created) VALUES ('$imgContent', '$dateTime')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        }
    }else{
        echo "Please select an image file to upload.";
    }
}
?>


<form action="" method="post" enctype="multipart/form-data">

    Select image to upload:

    <input type="file" name="image" required />

    <input type="submit" name="submit" value="UPLOAD"/>

</form>
