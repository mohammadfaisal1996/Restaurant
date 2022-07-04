<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();

      if(isset($_POST['pdfID'])&&isset($_POST['status'])&&isset($_POST['type'])){
          
        $pdfID=$_POST['pdfID'];
         $status=$_POST['status'];
         $type=$_POST['type'];
       

        

        $sql = "update `PDF` set status =$status where id=$pdfID";
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