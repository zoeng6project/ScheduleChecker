<?php
session_start();

require './inc/database.php';

if(isset($_POST['delete_order'])){
    $order = $_POST['delete_order'];

    try{

        $sql = "DELETE FROM `Order` where `Order` = '$order'; ";
        $stmt = $conn -> prepare($sql);
        $query_exe = $stmt-> execute();
        
        if($query_exe){
            $_SESSION['message'] = "   ***  Order# : $order has been deleted. ";
            header('Location: view.php');
        }
        else {
            $_SESSION['message'] = "    ***     Order not deleted , please try again. ";
            header('Location: view.php');

        }
  
    }catch(PDOException $e){
        echo $e-> getMessage();
    }
}
?>