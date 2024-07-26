<?php
// store the user inputs in variables and hash the password
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

// connect to db
require 'database.php';

// set up and run the query
$sql = "SELECT user_id, username, company_code  FROM login 
        WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
echo "before count";
// store the number of results in a variable
$count = $result->rowCount();

echo $count;
// check if any matches found
if ($count == 1) {
    $row = $result->fetch();
	echo $row;

    // access the existing session created automatically by the server
    session_start();
    $last_activity = time() ;
echo $last_activity;
    // take the user's id from the database and store it in a session variable
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['company_code'] = $row['company_code'];
    $_SESSION['timeout'] = $last_activity  + 30;
	$username= $row['username'];
echo $_SESSION['user_id'] ;
	echo $_SESSION['username'] ;
	echo $username ;
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
