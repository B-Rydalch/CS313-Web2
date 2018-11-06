<?php 
    require('dbconnection.php');
	session_start();
	$registered = false; 

	function existing_user() {
		$db = connect_db();
		$user_name = htmlspecialchars($_POST['user_name']);
	
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
	
	function add_account($db) {
		try {
            $user_name = htmlspecialchars($_POST['user_name']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);

            // need to add email values once ready to hash passwords
			$stmt = $db->prepare("Insert INTO chef (username, password) values(:identity, :credentials);");
			$stmt->bindvalue(':identity', $user_name, PDO::PARAM_STR); 
			$stmt->bindvalue(':credentials', $password, PDO::PARAM_STR); 
            $stmt->execute();
            
            $registered = true; 

		} catch (PDOException $ex) {
			echo $ex;
            die();
		}
	}

	existing_user();

	if ($registered == true) {
		// direct to new page 
        $new_page = "login.php";
		header("Location: $new_page");
		die();
	} else {
		// return to register account 
		alert('New user was not registered.');
		$new_page = "login.php";
		header("Location: $new_page");
		die();
	}

	// page should die before reaching this
	echo "Page should have died"; 
	die();

?> 