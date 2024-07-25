<?php require ('./inc/header.php');session_start();require './inc/database.php';
    if (isset($_SESSION['user_id']) || (time() < $_SESSION['timeout'])) {
        header('location: logout.php');
    }
?> 
		<main>

            <h2>Login / Sign Up</h2>

                <fieldset>
                    <legend> Login </legend>
                    <h3>Already have an account, then sign in below!</h3>
                        <form method="post" action="./inc/validate.php">
                            <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                            <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                        <input class="button" type="submit" value="Login" />
                        </form>   
                </fieldset>
            
                <fieldset>
                    <legend> Sign Up </legend>
                    <h3>Don't have an account, then sign up below!</h3>
                        <form method="post" action="save-admin.php">
                            <p><input class="form-control" name="company_code" type="text" placeholder="Company Code" required /></p>
                            <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                            <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                            <p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required /></p>
                            <input class="button" type="submit" name="submit" value="Register" />
                        </form>
                    
                </fieldset>

        </main>
<?php require ('./inc/footer.php'); ?>