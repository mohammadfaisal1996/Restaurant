<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['value']) && isset($_POST['catid'])){
          
         $value=$_POST['value'];
         $catid=$_POST['catid'];
        




        $sql = "UPDATE  `category_items_list` set sort_no=$value  WHERE category_id  = '$catid'  ";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
            // echo "done";
        }





      }

    
      
      ?>