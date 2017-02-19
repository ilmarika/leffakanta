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
