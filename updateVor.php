<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['id'])&&isset($_POST['value'])){
          
         $id=$_POST['id'];
         $value=$_POST['value'];

     
  

 
      
        $sql = "UPDATE `VOR` SET `password` ='$value'  WHERE id  = $id";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){
         

            
         }

      }

    
      
      ?>