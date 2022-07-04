<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $delete=$_POST['Delete'];
        $sql = "DELETE  FROM `branches_store` WHERE serial_no  = '$delete'  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();


        $sql2 = "DELETE  FROM `branch_store_lang` WHERE branch_code  = '$delete'  ";
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();







      }

    
      
      ?>