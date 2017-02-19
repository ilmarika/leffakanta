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

//Checking if user has a necessary cookies
include "cookieCheck.php";
$cookiecheck = new cookieCheck();

if($cookiecheck->cookieCheck()) {
        
            $servername = "localhost";
            $username = "leffawrite";
            $password = "!SalasanaKirjoittamistaVarten17";
            $dbname = "movies";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            //Getting the data from the fields in addmovies.php and inserting them into the database
        
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
} else {
    
    //if user does not posess necessary cookies redirecring them to login page
    
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