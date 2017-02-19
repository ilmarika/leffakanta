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
?>
<html>
<head>
        <title>Edit movie details.</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
        h1 {
                font-size: 56px;
        }
        h5 {
                font-size: 24px;
        }
        body {
                background: url("tausta.png");
        }
        .table {
                width:65%;
                margin: auto;
        }
        </style>
        </head>
<body>

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
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        // Check connection
        $sql = "SELECT * FROM movies where id = $id";


        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
             // output data of each row
         echo"<h4 class=text-center>Details of the movie</h4>";
                         echo "<table class='table table-striped'>
                         <thead>
                         <tr>
                         <th>Name</th>
                         <th>Year</th>
                         <th>Cast</th>
                         <th>Age restriction</th>
                         <th>Format</th>
                         <th>Genre</th>
                         <th>Language(s)</th>
                         </tr>
                         </thead>";
                         while($row = $result->fetch_assoc()) {
                                echo "<tbody><tr>";
                                echo "<td> <form action='editaction.php?id=". $id ."&column=name' method='post'>
                                <input type='text' name='data' value='". $row["name"] ."'><br>
                                <input type='submit'>
                                </form></td>";
                                echo "<td> <form action='editaction.php?id=". $id ."&column=year' method='post'>
                                <input type='text' name='data' value='". $row["year"] ."'><br>
                                <input type='submit'>
                                </form></td>";
                                echo "<td> <form action='editaction.php?id=". $id ."&column=cast' method='post'>
                                <input type='text' name='data' value='". $row["cast"] ."'><br>
                                <input type='submit'>
                                </form></td>";
                                echo "<td> <form action='editaction.php?id=". $id ."&column=agelimit' method='post'>
                                <input type='text' name='data' value='". $row["agelimit"] ."'><br>
                                <input type='submit'>
                                </form></td>";
                                echo "<td> <form action='editaction.php?id=". $id ."&column=medium' method='post'>
                                <input type='text' name='data' value='". $row["medium"] ."'><br>
                                <input type='submit'>
                                </form></td>";
                                echo "<td> <form action='editaction.php?id=". $id ."&column=genre' method='post'>
                                <input type='text' name='data' value='". $row["genre"] ."'><br>
                                <input type='submit'>
                                </form></td>";
                                echo "<td> <form action='editaction.php?id=". $id ."&column=language' method='post'>
                                <input type='text' name='data' value='". $row["language"] ."'><br>
                                <input type='submit'>
                                </form></td>";
                                echo "<td> <a href=deleteaction.php?id=". $id .">Delete Movie</a>
                                </form></td>";
                         }
                        echo "<tr><td><form method='post' action='moviedetails.php?id=". $id ."'>
                                <button>Go back</button>
                                </form></td></tr>";
                         echo "</tr> </tbody> </table>";


        } else {
             echo "0 results";
        }

        unset($conn);
        }
    } else {
        header ("Location: login.php");
    }
    ?>

</body>
</html>