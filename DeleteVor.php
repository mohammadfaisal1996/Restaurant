<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $Delete=$_POST['Delete'];
  

 
      
        $sql = "DELETE  FROM `VOR` WHERE id  = $Delete";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){

            
         }



      }

    
      
      ?>