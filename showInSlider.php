


<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['catID'])&&isset($_POST['status'])){
          
        $catID=$_POST['catID'];
         $status=$_POST['status'];

       



        $sql = "update category_items_list set ShowINslider =$status where category_id=$catID ";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){

           
        }




      }

    
      
      ?>