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

        $data = mysqli_real_escape_string($conn, $_POST['data']);
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $column = mysqli_real_escape_string($conn, $_GET['column']);

        $sql = "UPDATE movies SET $column='$data' WHERE id=$id";

        echo "<html>
              <head>
              <meta http-equiv='refresh' content='2;url=editmovie.php?id=". $id ."' />
              <title>";

        if ($conn->query($sql) === TRUE) {
            echo "Record edited successfully";
            echo "</title>";
            echo "<body>";
            echo "Record edited successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "</title>";
            echo "<body>";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "</body>
            </head>
        </html>";

        $conn->close();
        
    }
    
} else {
    header ("Location: login.php");
}

?>