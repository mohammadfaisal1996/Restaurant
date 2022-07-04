<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['catID'])&&isset($_POST['status'])){
          
        $catID=$_POST['catID'];
         $status=$_POST['status'];

        $sql = "update category_items_list set Status =$status where category_id=$catID ";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){

          if($status==0){
            $sql2 = "update category_items_list set Status =$status ,ShowINslider=$status where category_master=$catID ";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
          }else{
            $sql2 = "update category_items_list set Status =$status  where category_master=$catID ";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
          }

      
        }




      }

    
      
      ?>