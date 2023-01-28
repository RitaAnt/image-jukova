<?php
if(!empty($_GET['id'])){
//DB details
    $dbHost = 'localhost';
    $dbUsername = 'root'; //give your database name here
    $dbPassword = ''; //give your database password here
    $dbName = 'Juckova';

//Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Check connection
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }

//Get image data from database
    $result = $db->query("SELECT image FROM images WHERE id = {$_GET['id']}");

    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();

//Render image
        header("Content-type: image/jpg");
        echo $imgData['image'];
    }else{
        echo 'Image not found...';
    }
}
?>
<form action="" method="get" enctype="multipart/form-data">

    Select image to upload:

    <input type="text" name="id"/>

    <input type="submit" name="submit" value="Display"/>

</form>