<?php
    require('dbconnection.php');
    session_start();
    $db = connect_db();

    function loginUser($db) {
        $user = htmlspecialchars($_POST['user']);
        $pass = htmlspecialchars($_POST['pass']);
        
        try {
            $stmt = $db->prepare("SELECT id, username, password FROM chef 
                                    WHERE username = :usr;");

            $stmt->bindValue(':usr', $user, PDO::PARAM_STR);
            $stmt->execute();
            $dbUser = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($dbUser['username'] == $user && password_verify($pass, $dbUser['password'])) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['name'] = $user;
                $_SESSION['userId'] = $dbUser['id'];

                header('Location: index.php');
                die();
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

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        loginUser($db);
    }
?>

<!DOCTYPE HTML>
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
    <div class="container py-5">
        <div class="row">
            <?php unset($_SESSION['name']); $_SESSION['loggedIn'] = false; ?>
            <div class="col-md-12">
                <h2 class="text-center text-white mb-4">Please login.</h2>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Login</h3>
                            </div>
                            <div class="card-body">
                                <form action="" novalidate="" method="POST">
                                    <div class="form-group">
                                        <label for="user">Username</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="user" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-lg rounded-0" name="pass" required>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-lg float-right">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="create-account.php" class="create-account">Create new account</a>
    <a href="#" class="forgot-password">Forgot the password?</a>
</body>
</html>




