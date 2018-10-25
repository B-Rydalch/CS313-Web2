<?php
    require ('dbconnection.php');
    session_start();
    $db = connect_db();

    function cheflogin($db) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        try {
            $stmt = $db->prepare("SELECT username, password FROM chef 
                                    WHERE username = :uname;");
    
            $stmt->bindValue(':uname', $user, PDO::PARAM_STR);
            $stmt->execute();
            $dbUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dbUser['username'] === $user && $dbUser['password'] === $pass) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['user'] = $user;

                header('Location:index.php');
                exit;

            } else {
                alert('Login credentials not found!');
            }
        } catch (PDOException $ex) {
            echo $ex;
            die();
        }
    }

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }


    if (isset($_POST['username']) && isset($_POST['password'])) {
        $db = connect_db();
        cheflogin($db);
    }
?>

<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CS313</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type="text/css" media="screen" href='./css/login-stylesheet.css'>
    <!-- <script src='./scripts/login.js'></script> -->

    <!--boostrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">
    <?php unset($_SESSION['name']); $_SESSION['loggedIn'] = false; ?>
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <form class="form-signin" action="" metod="POST">
                <input type='text' class="form-control" name='user' placeholder="User Name" required autofocus>
                <input type="password" class="form-control" name='pass' placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="create-account.php" class="create-account">Create new account</a>
            <a href="#" class="forgot-password">Forgot the password?</a>
        </div><!-- /card-container -->
    </div><!-- /container -->  

    <?php 
        if ($_SESSION['loggedIn'] = true;){
            echo $stmt;
        }
    ?>
</body>
</html>