<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['update'])){
          
        $sql = "UPDATE `seqanceOrder` set `seqanceOrder`.count=1000 ";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){
         
          
            
         }

      }

    
      
      ?>