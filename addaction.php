<?php

$user = 'admin';
$pass = 'aad74af7a24d0c6e16a95657e9610954d5e7d909c83fc4b01abcfb674198dce9f928127d6688745e24f26c1b67fefd024e92af1fd5fa17b4feb478aa712b4384';

if(isset($_COOKIE['username']) && isset ($_COOKIE['password'])) {
    
    if (($_COOKIE['username'] != $user) || ($_COOKIE['password'] != $pass)) {
            
            header ("Location: login.php");
        } else {
        
            $servername = "localhost";
            $username = "root";
            $password = "!OpettajaEspooPekka";
            $dbname = "movies";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 


            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $year = mysqli_real_escape_string($conn, $_POST['year']);
            $cast = mysqli_real_escape_string($conn, $_POST['cast']);
            $agelimit = mysqli_real_escape_string($conn, $_POST['agelimit']);
            $medium = mysqli_real_escape_string($conn, $_POST['medium']);
            $genre = mysqli_real_escape_string($conn, $_POST['genre']);
            $language = mysqli_real_escape_string($conn, $_POST['language']);
            $rating = mysqli_real_escape_string($conn, $_POST['rating']);
            $director = mysqli_real_escape_string($conn, $_POST['director']);
            $writer = mysqli_real_escape_string($conn, $_POST['writer']);
            $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
            $originalname = mysqli_real_escape_string($conn, $_POST['originalname']);

            $sql = "INSERT INTO movies (name, year, cast, agelimit, medium, genre, language, rating, director, writer, subtitle, originalname) VALUES ('$name','$year','$cast','$agelimit','$medium','$genre','$language','$rating','$director','$writer','$subtitle','$originalname')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
} else {
    header ("Location: login.php");
}
?>

<html>
    <head>
        <title>
            New record created successfully 
        </title>
        <meta http-equiv="refresh" content="2;url=addmovies.php" />
    </head>
</html>