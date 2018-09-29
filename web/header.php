<?php
    $filename = $_SERVER['REQUEST_URI'];
    $about = "";
    $home = "";
    $login = "";
    if ($filename == '/w02-toa/about-us.php') {
        $about = " active";
    } else if ($filename == '/w02-toa/home.php') {
        $home = " active";
    } else if ($filename == '/w02-toa/login.php') {
        $login = " active";
    }
    echo "<nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top link-top'>
            <a class='navbar-brand' href='#'>Ice Cream Corp.</a>
            <div class='collapse navbar-collapse'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link$about' href='./about-us.php'>About us</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link$home' href='./home.php'>Home</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link$loging' href='./login.php'>Login</a>
                    </li>
                </ul>
            </div>
        </nav>";
?>