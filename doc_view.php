<?php session_start(); require ('./inc/header.php'); require_once('inc/database.php');?>

		<main>
            <h2>View Documents  ||  <?php echo $_POST['doc_view']; ?></h2>

                <fieldset>
                    <legend>doc</legend>
                    <?php
                        $order = $_POST['doc_view']; 
                        $stmt = $conn->prepare('SELECT * FROM `image` WHERE `image` LIKE ? order by `name` DESC');
                        $stmt->execute(['%' . $order . '%']);
                        $filelist = $stmt->fetchAll();

                      foreach($filelist as $file) {
                        $fileExtension = pathinfo($file['image'], PATHINFO_EXTENSION);
                        if($fileExtension == "pdf"){
                    ?>
                          <object type = "application/pdf" data = "<?=$file['image']?>" width="600px" height="800px" ></object>
                          <p><?php echo $file["name"]; ?></p>

                        <?php
                        } else {
                        ?>
                          <img src="<?=$file['image']?>" alt="<?=$file['name'] ?>" class="img-fluid" style="width: 600px; height: auto;">
                          <p><?php echo $file["name"]; ?></p>

                    
                        <?php
                        }
                      }  
                        ?>

                </fieldset>
            
        </main>
<?php require ('./inc/footer.php'); ?>