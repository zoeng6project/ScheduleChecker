<?php session_start(); require ('./inc/header.php'); require_once('inc/database.php');?>
		<main>
            <h2>Track your order </h2>
            
                <fieldset>
                    <legend>Order Input</legend>
                    
                    <form id="order"  method="post" enctype="multipart/form-data">

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
                            <input type="text" id="order" name="order" required>
                        </div>

                        <div>
                            <label for="dest">Destination :</label>
                            <input type="text" id="dest" name="dest">
                        </div>

                        <div>
                            <label for="ETA">ETA :</label>
                            <input type="date" id="ETA" name="ETA">
                        </div>

                        <div>
                            <label for="image">Upload Image:</label>
                            <input type='file' id="file" name='file' />
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" value="Submit">Submit</button>
                        </div>
                    </form>
                    <div style="text-align: center;">
                    <?php
                       
                            

                            if(!empty($_POST)){
                                $mode = $_POST['mode'];
                                $order = $_POST['order'];
                                $dest = $_POST['dest'];
                                $ETA = $_POST['ETA'];

                                $sql = "INSERT INTO `Order`(`Mode`, `Order`, `Dest`, `ETA`) VALUES ('$mode', '$order', '$dest', '$ETA')";
                                $insert_order = $conn->exec($sql);





                                if($insert_order  ){
                                    echo "  successfully inserted order# $order.";
                                }
                            

                            }  
                        
                    ?>

			        </div>
                </fieldset>
            
        </main>
<?php require ('./inc/footer.php'); ?>
