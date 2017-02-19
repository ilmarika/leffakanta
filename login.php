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
<title>User Logon</title>
</head>
<body>
  <h2>User Login </h2>
  <form name="login" method="post" action="login.php">
   Username: <input type="text" name="username"><br>
   Password: <input type="password" name="password"><br>
   Remember Me: <input type="checkbox" name="rememberme" value="1"><br>
   <input type="submit" name="submit" value="Login!">
  </form>
</body>
</html>

<?php
/* These are our valid username and passwords */
$user = 'admin';
$pass = 'aad74af7a24d0c6e16a95657e9610954d5e7d909c83fc4b01abcfb674198dce9f928127d6688745e24f26c1b67fefd024e92af1fd5fa17b4feb478aa712b4384';

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    if (($_POST['username'] == $user) && (hash("Sha512", "". $_POST['password'] ."") == $pass)) {    
        
        if (isset($_POST['rememberme'])) {
            /* Set cookie to last 1 year */
            setcookie('username', $_POST['username'], time()+60*60*24*365, '/');
            setcookie('password', hash("Sha512", "". $_POST['password'] .""), time()+60*60*24*365, '/');
        
        } else {
            /* Cookie expires when browser closes */
            setcookie('username', $_POST['username'], false, '/');
            setcookie('password', hash("Sha512", "". $_POST['password'] .""), false, '/');
        }
        header('Location: index.php');
        
    } else {
        echo 'Username/Password Invalid';
    }
    
} else {
    echo 'You must supply a username and password.';
}
?>