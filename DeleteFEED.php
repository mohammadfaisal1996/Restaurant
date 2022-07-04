<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $delete=$_POST['Delete'];
        $sql = "DELETE  FROM `Feedback` WHERE serial_no  = '$delete'  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();


      



      }

    
      
      ?>