<!DOCTYPE html>
<html lang="en">
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Week03-Teach</title>
   </head>
   <body style="font-size:25px;">
        <form action="results.php" method="post">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            Major:<br>
            <?php
                $arr = array("Computer Science", "Web Design & Development", "Computer Information Technology", "Computer Engineering");

                foreach ($arr as $major) {
                    echo "<input type=\"radio\" name=\"major\" value=\"$major\"> $major<br>";
                }
            ?>
            Continents visited:<br>
            <input type="checkbox" name="continent[]" value="North America"> North America<br>
            <input type="checkbox" name="continent[]" value="South America"> South America<br>
            <input type="checkbox" name="continent[]" value="Europe"> Europe<br>
            <input type="checkbox" name="continent[]" value="Asia"> Asia<br>
            <input type="checkbox" name="continent[]" value="Australia"> Australia<br>
            <input type="checkbox" name="continent[]" value="Africa"> Africa<br>
            <input type="checkbox" name="continent[]" value="Antarctica"> Antarctica<br>
            Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
            <input type="submit">
        </form>
   </body>
</html>