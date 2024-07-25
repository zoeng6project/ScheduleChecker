<?php

	require './inc/database.php';

	$company_code = $_POST['company_code'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];

	$ok = true;
	require './inc/header.php';
		if (empty($company_code)) {
			echo '<p>Company code required</p>';
			$ok = false;
		}
		if (empty($username)) {
			echo '<p>Username required</p>';
			$ok = false;
		}
		if ((empty($password)) || ($password != $confirm)) {
			echo '<p>Invalid passwords</p>';
			$ok = false;
		}

	if ($ok){

		$password = hash('sha512', $password);
		$sql = "INSERT INTO `login`(`company_code`, `username`, `password`) VALUES ('$company_code','$username','$password')";
		$conn->exec($sql);
		echo " welcome ! '$username' your account has be registered, now start explore our service. ";

	}
	?>

<?php require './inc/footer.php'; ?>
