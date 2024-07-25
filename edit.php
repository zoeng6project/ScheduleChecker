<?php session_start(); require ('./inc/header.php'); require_once('inc/database.php');?>

		<main>
            <h2>Edit 
                <?php 
                    echo $_POST['edit_order']; 
                    $order = $_POST['edit_order'];
                ?>
            </h2>

                <fieldset>
                    <legend>Order Input</legend>
                    <form id="order"  name="update_order" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="company_code">Company Code :</label>
                            <input type="text" id="company_code" name="company_code" value="<?php echo $_SESSION['company_code']; ?>" readonly style="background-color: #f2f2f2;">
                        </div>
                        <div>
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" readonly style="background-color: #f2f2f2;">
                        </div>
                        <div>
                            <label for="mode">Transportation Mode :</label>
                            <select name="mode">
                            <option value=""></option>
                            <option value="Sea">Sea</option>
                            <option value="Air">Air</option>
                            <option value="Rail">Rail</option>
                            <option value="Truck">Truck</option>
                            </select>
                        </div>

                        <div>
                            <label for="order">Tracking Number :</label>
                            <input type="text" id="order" name="order" value="<?php echo $order; ?>" readonly style="background-color: #f2f2f2;">
                        </div>

                        <div>
                            <label for="dest">Destination :</label>
                            <input type="text" id="dest" name="dest" required >
                        </div>

                        <div>
                            <label for="ETA">ETA :</label>
                            <input type="date" id="ETA" name="ETA" required>
                        </div>

                        <div>
                            <label for="image">Upload Image:</label>
                            <input type='file' id="file" name='file' />
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" value="Update">Update</button>
                        </div>
                    </form>
                    <div style="text-align: center;">
                    <?php
                        if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
                            session_unset();     
                            session_destroy();
                            header('location: login.php');
                        } else{
                            if(isset($_POST)){
                                $company_code = $_SESSION['company_code'];
                                $username = $_SESSION['username'];
                                $mode = $_POST['mode'];
                                $order = $_POST['order'];
                                $dest = $_POST['dest'];
                                $ETA = $_POST['ETA'];

                                $sql = "UPDATE `Order`SET `company_code` = '$company_code', `username` = '$username',`Mode` = '$mode', `Dest`= '$dest', `ETA` = '$ETA' WHERE `Order`= '$order'";
                                $update_order = $conn->exec($sql);

                                $uploadSuccess = false; 
                                
                                $filename = $company_code ."_". $order."_". time();
                                $target_file = './uploads/' . $filename . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        

                                if( move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                                    $query = "INSERT INTO `image` (name, image) VALUES(?, ?)";
                                    $statement = $conn->prepare($query);
                                    $statement->execute([$filename, $target_file]);
                                    $uploadSuccess = true; 
                                } 


                                if($update_order && $uploadSuccess ){
                                    echo "  successfully inserted order# $order.";
                                }

                            }

                                
                        }
                        
                    ?>

			        </div>
                </fieldset>
            
        </main>
<?php require ('./inc/footer.php'); ?>