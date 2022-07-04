<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $delete=$_POST['Delete'];
        $sql = "DELETE  FROM `category_items_list` WHERE category_id  = '$delete'  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();


        $sql2 = "DELETE  FROM `category_lang` WHERE category_id  = '$delete'  ";
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();



        $sql3 = "DELETE  FROM `item_mapping` WHERE cat_id  = $delete ";
        $stmt3 = $db->prepare($sql3);
         $stmt3->execute();



      }

    
      
      ?>