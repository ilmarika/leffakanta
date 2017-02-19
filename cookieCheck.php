<?php

class cookieCheck {
    function cookieCheck() {
    $user = 'admin';
    $pass = 'aad74af7a24d0c6e16a95657e9610954d5e7d909c83fc4b01abcfb674198dce9f928127d6688745e24f26c1b67fefd024e92af1fd5fa17b4feb478aa712b4384';
    if(isset($_COOKIE['username']) && isset ($_COOKIE['password'])) {
        if (($_COOKIE['username'] != $user) || ($_COOKIE['password'] != $pass)) {
            return false;
        } else {
            return true;
        }
        } else {
            return false;
        }
    }
}
?>