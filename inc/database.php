<?php
	try{
		$conn = new PDO('mysql:host=localhost;dbname=TrackingOrder','root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}

	if ($_SESSION['user_id'] != null) {
		$last_activity = time() ;
		$_SESSION['timeout'] = $last_activity  + 30;
		setcookie('username', $username, $last_activity  +  30, '/');
	}

?>

