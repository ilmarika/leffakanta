<?php
/*
Copyright (C) 2017  Ilmari Kallioniemi

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA. */

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


            $id = mysqli_real_escape_string($conn, $_GET['id']);

            $sql = "DELETE FROM movies WHERE id=". $id ."";

            if ($conn->query($sql) === TRUE) {
                echo "Movie deleted successfully";
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
        <title><?php if ($conn->query($sql) === TRUE) {
                echo "Movie deleted successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                } ?> 
        </title>
        <meta http-equiv="refresh" content="2;url=index.php" />
    </head>
</html>