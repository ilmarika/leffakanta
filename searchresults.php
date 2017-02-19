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
        <title>Search movies from collection.</title>
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
$servername = "localhost";
$username = "leffaread";
$password = "!SalasanaLukuaVarten17";
$dbname = "movies";
$previous = $_SERVER['HTTP_REFERER'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$search = mysqli_real_escape_string($conn, $_POST['search']);
$_SESSION['searchterms'] = $search;
// Check connection
$sql = "SELECT * FROM movies where name like '%$search%'
                                or year like '%$search%'
                                or cast like '%$search%'
                                or agelimit like '%$search%'
                                or medium like '%$search%'
                                or genre like '%$search%'
                                or language like '%$search%'
                                or rating like '%$search%'
                                or director like '%$search%'
                                or writer like '%$search%'
                                or subtitle like '%$search%'
                                or originalname like '%$search%'";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
     // output data of each row
 echo"<h4 class=text-center>Movies in collection</h4>";
                 echo "<table class='table table-striped'>
                 <thead>
                 <tr>
                 <th>Name</th>
                 </tr>
                 </thead>";
                 while($row = $result->fetch_assoc()) {
                        echo "<tbody><tr>";
                        echo "<td> <a href=moviedetails.php?id=". $row["id"] .">". $row["name"] ."<a/></td>";
                 }
                 echo "<tr><td><form method='post' action='index.php'>
                            <button>Go back</button>
                        </form></td></tr>";
                 echo "</tr> </tbody> </table>";


} else {
     echo "0 results";
}

unset($conn);
?>
</body>
</html>
