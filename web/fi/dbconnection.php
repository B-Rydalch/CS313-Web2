<html>
<header></header>
<body>
<?php
// function get_db() {
    $db = NULL;
    $production = false;

	try {
		var_dump("try");
		$dbUrl = getenv('DATABASE_URL');
		var_dump($dburl);

		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		$db = new PDO("pgsql:host=$dbHost; port=$dbPort; dbname=$dbName",
						$dbUser, 
						$dbPassword);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $ex) {
		var_dump("catch");
        if (!$production) {
            echo "Error connecting to DB. Details: $ex";
        }
        
		die();
	}

	var_dump($db);
	return $db;
// }
?>

</body>


</html>