<?php
    // setcookie("fav-text", "c is for cookie", time() + (86400*7));
    // $favorite = $_COOKIE["fav-text"];

    session_start()

    if (!isset($_SESSION["activeSession"])) {
        $_SESSION["activeSession"] = true;
        $_SESSION["counter"] = 0;
    }

    $_SESSION["counter"]++;
    
?>

<html>
    <body>
        <br><p>You have visited this page <?php  $_SESSION["counter"] ?>  number of times.</p><br>
    </body>
</html>