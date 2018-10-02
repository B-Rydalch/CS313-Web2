<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
<a href="mailto:<?php echo $_POST["email"]; ?>"> Email <?php echo $_POST["email"]; ?></a><br>
Your major is: <?php echo $_POST["major"];?><br>
Your comment is: <?php echo $_POST["comment"];?><br>
Countries visited:<br>

<?php
    foreach($_POST["continent"] as $selected) {
        echo "<p>$selected</p><br>";
    }
?>  

</body>
</html>