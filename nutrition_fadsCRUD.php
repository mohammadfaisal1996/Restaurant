<?php 
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();


      if(isset($_POST['Delete'])){
          
         $ID=$_POST['Delete'];
        $sql = "DELETE  FROM `item_nutrition_fads` WHERE id  = '$ID'  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
      }

       if(isset($_POST['update'])){

         $ID=$_POST['update'];
         $status=$_POST['status'];

        $sql = "Update  `item_nutrition_fads` set status =$status WHERE id  = '$ID'  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

       }

?>