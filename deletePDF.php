<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $pdfID=$_POST['Delete'];
       

      
        $sql = "DELETE  FROM `PDF` WHERE  id=$pdfID";
        $stmt = $db->prepare($sql);
         if($stmt->execute()){
            

         }




   
 
 
      }
    
      
      ?>