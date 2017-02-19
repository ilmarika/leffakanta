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

session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <title>Movie details.</title>
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
include "cookieCheck.php";

    $servername = "localhost";
    $username = "leffaread";
    $password = "!SalasanaLukuaVarten17";
    $dbname = "movies";
    $cookiecheck = new cookieCheck();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // Check connection
    $sql = "SELECT * FROM movies where id = $id";

    $previous = $_SERVER['HTTP_REFERER'];
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
                            echo "<td>". $row["name"] ."</td>";
                            echo "<td>". $row["year"] ."</td>";
                            echo "<td>". $row["cast"] ."</td>";
                            echo "<td>". $row["agelimit"] ."</td>";
                            echo "<td>". $row["medium"] ."</td>";
                            echo "<td>". $row["genre"] ."</td>";
                            echo "<td>". $row["language"] ."</td>";
                            if ($cookiecheck->cookieCheck()) {
                                echo "<td><a href=editmovie.php?id=". $id .">Edit movie.</td>";
                            } else {
                                echo "";
                            }
                            echo "<tr><td><form method='post' action='searchresults.php'>
                            <button><input type='hidden' name='search' value='". $_SESSION['searchterms'] ."'>Go back</button>
                                </form></td></tr>";
                            echo "</tr> </tbody> </table>";

                     }
    } else {
         echo "0 results";
echo "<tr><td><form method='post' action='searchresults.php'>
        <button><input type='hidden' name='search' value='". $_SESSION['searchterms'] ."'>Go back</button>
    </form></td></tr>";
    }
    
    unset($conn);
?>
</body>
</html>
