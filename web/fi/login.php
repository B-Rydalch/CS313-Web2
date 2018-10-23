<?php
    session_start();

    function get_db() {
        $db = NULL;
        $production = false;
        try {
            $dbUrl = getenv('DATABASE_URL');
            $dbopts = parse_url($dbUrl);
            $dbHost = $dbopts["host"];
            $dbPort = $dbopts["port"];
            $dbUser = $dbopts["user"];
            $dbPassword = $dbopts["pass"];
            $dbName = ltrim($dbopts["path"],'/');
            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex) {
            if (!$production) {
                echo "Error connecting to DB. Details: $ex";
            }
            
            die();
        }
        return $db;
    }

    function cheflogin($db) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        try {
            $stmt = $db->prepare("SELECT username, password FROM chef 
                                    WHERE username = $user;");
            $stmt->execute();
            $dbUser = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($dbUser);

        
        //     if ($dbUser['username'] === $user && $dbUser['password'] === $pass) {
        //         $_SESSION['loggedIn'] = true;
        //         $_SESSION['user'] = $user;
        //         header('index.php');
        //         exit;
        //     } else {
        //         alert('Login credentials not found!');
        //         exit;
        //     }
        } catch (PDOException $ex) {
            die();
        }
    }

    if (isset($_POST)) {
        $db = get_db();
        cheflogin($db);
    }
?>

<!DOCTYPE HTML>
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CSs313</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type="text/css" media="screen" href='./css/login-stylesheet.css'>
    <!-- <script src='./scripts/login.js'></script> -->

    <!--boostrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<?php include "../header.php" ?>
<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="" metod="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type='text' id="input-user" class="form-control" placeholder="User Name" required autofocus>
                <input type="password" id="input-password" class="form-control" placeholder="Password" required>
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
</body>
</html>