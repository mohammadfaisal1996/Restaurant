<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $Delete=$_POST['Delete'];
  

 
      
        $sql = "DELETE FROM `banner` WHERE `ID`=$Delete";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){

            
         }



      }

    
      
      ?>