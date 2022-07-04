<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['catID'])&&isset($_POST['Deliveryfree'])){
          
        $catID=$_POST['catID'];
         $Deliveryfree=$_POST['Deliveryfree'];

        $sql = "update category_items_list set Deliveryfree ='$Deliveryfree' where category_id=$catID ";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
            $sql2 = "update category_items_list set Deliveryfree ='$Deliveryfree' where category_master=$catID ";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
        }




      }

    
      
      ?>