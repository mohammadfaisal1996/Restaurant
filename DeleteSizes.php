<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['CatID'])){
          
         $catid=$_POST['CatID'];
  

      
        $sql = "DELETE  FROM `ItemType` WHERE id  = $catid";
        $stmt = $db->prepare($sql);
         $stmt->execute();



      }

    
      
      ?>