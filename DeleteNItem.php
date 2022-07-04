<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $catid=$_POST['Delete'];

      
        $sql = "DELETE  FROM `category_items_list` WHERE category_id  = $catid ";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){
            


         $sql2 = "DELETE  FROM `category_lang` WHERE category_id  =$catid  ";
         $stmt2 = $db->prepare($sql2);
         $stmt2->execute();

         }




   
 
 
      }
    
      
      ?>