<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['CatID'])&&isset($_POST['itemid'])){
          
         $catid=$_POST['CatID'];
         $itemid=$_POST['itemid'];

      
        $sql = "DELETE  FROM `item_mapping` WHERE cat_id  = $catid and item_id =$itemid";
        $stmt = $db->prepare($sql);
         $stmt->execute();



      }

    
      
      ?>