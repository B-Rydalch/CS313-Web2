<?php
    $filename = $_SERVER['REQUEST_URI'];
    $about = "";
    $home = "";
    if ($filename == '/w02-toa/about-me.php') {
        $about = " active";
    } else if ($filename == '/w02-toa/home.php') {
        $home = " active";
    echo "<nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top link-top'>
            <a class='navbar-brand' href='#'>Brad Rydalch</a>
            <div class='collapse navbar-collapse'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link$about' href='./about-us.php'>About us</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link$home' href='./home.php'>Home</a>
                    </li>
                </ul>
            </div>
        </nav>";
?>