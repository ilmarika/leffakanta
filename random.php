<!DOCTYPE html>
<html>
<head>
        <title>Random movie from collection.</title>
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
$username = "root";
$password = "!OpettajaEspooPekka";
$dbname = "movies";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$sql = "SELECT * FROM movies order by rand() limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     // output data of each row
 echo"<h4 class=text-center>Random movie.</h4>";
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
