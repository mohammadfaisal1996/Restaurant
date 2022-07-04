<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $catid=$_POST['Delete'];

      
        $sql = "DELETE  FROM `AddOnes` WHERE  id=$catid";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){
            

         }




   
 
 
      }
    
      
      ?>