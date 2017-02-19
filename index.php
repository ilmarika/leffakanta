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
        
            <form action="searchresults.php" method="post">
                Search: <input type="text" name="search"><br>
    
    
                <input type="submit">
            </form>
            <form action="random.php" method="post">
                <input type="submit" value="Random movie">
            </form>
            <?php
            include "cookieCheck.php";
            $cookiecheck = new cookieCheck;
            if ($cookiecheck->cookieCheck()) {
                echo '<form action="addmovies.php" method="post">
                <input type="submit" value="Add a movie">
            </form>';
            } else {
            echo '<form action="login.php" method="">
                <input type="submit" value="Log In">
            </form>';
            }
            ?>

</body>
</html>
