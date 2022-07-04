<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();

      if( isset($_POST['QuotID']) && isset($_POST['status']) ){
          
        $QuotID=$_POST['QuotID'];
         $status=$_POST['status'];
      
       

        

        $sql = "update `Quote` set status =$status where id=$QuotID";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){

            // if($status==0){
             
            // }else{
            //     $status=0;
            //     $sql2 = "update `PDF` set status =$status where id != $pdfID and type ='$type'" ;
            //     $stmt2 = $db->prepare($sql2);
            //     $stmt2->execute();
            // }

        }




      }

    
      
      ?>