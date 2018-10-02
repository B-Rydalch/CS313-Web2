<?php
    $file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top link-top">
    <a class="navbar-brand" href="#">BR</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item activef">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./aboutme.php">About Me</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./projects.php">Projects</a>
            </li>
        </ul>
    </div>
</nav>