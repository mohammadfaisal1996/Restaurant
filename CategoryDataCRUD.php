<?php 
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();


      if(isset($_POST['Delete'])){
          
         $ID=$_POST['Delete'];
        $sql = "DELETE  FROM `categoryInfo` WHERE id  = '$ID'  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
      }

       if(isset($_POST['UpdateStatus'])){

         $ID=$_POST['UpdateStatus'];

         $status=$_POST['status'];
        $sql = "Update  `categoryInfo` set status =$status WHERE  id  = '$ID'  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

       }

?>