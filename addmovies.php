<?php
    $user = 'admin';
    $pass = 'aad74af7a24d0c6e16a95657e9610954d5e7d909c83fc4b01abcfb674198dce9f928127d6688745e24f26c1b67fefd024e92af1fd5fa17b4feb478aa712b4384';

    
    if(isset($_COOKIE['username']) && isset ($_COOKIE['password'])) {
        
        if (($_COOKIE['username'] != $user) || ($_COOKIE['password'] != $pass)) {
            
            header ("Location: login.php");
        } else {
echo '<html>
<head>
<title>Add movie</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<form action="addaction.php" method="post">
    Name: <input type="text" name="name"><br>
    Year: <input type="text" name="year"><br>
    Cast: <input type="text" name="cast"><br>
    Age restriction: <input type="text" name="agelimit"><br>
    Medium: <input type="text" name="medium"><br>
    Genre: <input type="text" name="genre"><br>
    Language: <input type="text" name="language"><br>
    Rating: <input type="text" name="rating"><br>
    Director: <input type="text" name="director"><br>
    Writer: <input type="text" name="writer"><br>
    Subtitle: <input type="text" name="subtitle"><br>
    Original name: <input type="text" name="originalname"><br>
    
    
    <input type="submit">
</form>
<form method="post" action="index.php">
    <button>Go back</button>
</form>

</body>
</html>';
        }
    } else {
        header ("Location: login.php");
    }