<?php require ('./inc/header.php');session_start();require './inc/database.php';?> 
		<main>

            <h2>Logout
                <?php 
                    echo $_SESSION['username']; 
                ?>
            </h2>

                <fieldset>
                    <legend> Logout  </legend>

                    <form id="logout"  method="post" >
                        <div style="text-align: center;">
                            <button type="submit" name="delete" value="Submit">Logout</button>
                        </div>
                    </form>

                </fieldset>
            
                <?php
                    if(isset($_POST['delete'])){
                        
                            session_unset();     
                            session_destroy();
                            header('location: login.php');
                        
                    }
                ?> 

        </main>
<?php require ('./inc/footer.php'); ?>