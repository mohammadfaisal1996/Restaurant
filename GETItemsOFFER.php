<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['typeItem'])){
          
         $catid=$_POST['typeItem'];

      
        $sql = "select * FROM `offer` WHERE  offer_id=$catid";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){
            

         }




   
 
 
      }
    
      
      ?>