<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['BranchID'])&&isset($_POST['status'])){
          
        $BranchID=$_POST['BranchID'];
         $status=$_POST['status'];

        $sql = "update branches_store set Status =$status where serial_no=$BranchID ";
        $stmt = $db->prepare($sql);
        $stmt->execute();




      }

    
      
      ?>