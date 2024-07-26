<?php
session_start();
require 'database.php';

// store the user inputs in variables and hash the password
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

// set up and run the query
$sql = "SELECT user_id, username, company_code  FROM login 
        WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// store the number of results in a variable
$count = $result->rowCount();

// check if any matches found
if ($count == 1) {
    $row = $result->fetch();

    $last_activity = time() ;

    // take the user's id from the database and store it in a session variable
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['company_code'] = $row['company_code'];
    $_SESSION['timeout'] = $last_activity  + 30;
	$username= $row['username'];

    // Set cookie
    setcookie('username', $username, $last_activity  +  30, '/');

    // redirect the user
    header('Location: ../view.php');
echo "end of loop" ;	
} else {
    echo 'Invalid Login';
}
$conn = null;
?>
