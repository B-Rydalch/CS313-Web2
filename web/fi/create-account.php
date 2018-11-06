<?php 
    require('dbconnection.php');
	session_start();
	$registered = false; 

	function existing_user() {
		$db = connect_db();
		$user_name = htmlspecialchars($_POST['user_name']);
		$password = htmlspecialchars($_POST['password']);
		$email = htmlspecialchars($_POST['email']);

		
		try {
			$stmt = $db->prepare("select exists (select 1 from chef where username = :uname LIMIT 1);");
			$stmt->bindvalue(':uname', $user_name, PDO::PARAM_STR);
            $stmt->execute();
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if($results['exists']) {
				alert('Please select another User name.');
			} else {
				add_account($db);
            }

		} catch (PDOException $ex) {
			echo $ex;
            die();
		}		
	}

	function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
	
	function add_account($db, $registered) {
		try {
			$stmt = $db->prepare("Insert INTO chef (username, password) values(:identity, :credentials);");
			$stmt->bindvalue(':identity', $user_name, PDO::PARAM_STR); 
			$stmt->bindvalue(':credentials', $password, PDO::PARAM_STR); 
			$stmt->execute();
			die();

		} catch (PDOException $ex) {
			echo $ex;
            die();
		}
	}

	if ($registered == true) {
		// direct to new page 
        $new_page = "login.php";
		header("Location: $new_page");
		die();
	} else {
		// return to register account 
		$new_page = "create-account.php";
		header("Location: $new_page");
		die();
	}

	// page should die before reaching this
	echo "Page should have died"; 
	die();

?> 

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CS313</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/create-stylesheet.css" />

    <!--Boostrap-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up for Food Inventory  <small><br>Everyone likes FI Becuse It's free!</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="" method="POST" >
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="user_name" id="first_name" class="form-control input-sm" placeholder="User Name">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
</body>
</html>
 