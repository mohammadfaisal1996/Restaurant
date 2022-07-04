<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['Delete'])){
          
         $offerID=$_POST['Delete'];

         
                                    $sqlGetItems="SELECT itemid  FROM `ItemOFFER` where offerID =$offerID";
                                   $stmtGetItems = $db->prepare($sqlGetItems);
                                   if($stmtGetItems->execute()){

                                                while($row = $stmtGetItems->fetch(PDO::FETCH_ASSOC)) {
                                                    $item_id=$row['itemid']; 

                                                    $sql3 = "UPDATE `ItemType` SET `price`=ItemType.OldPrice  , `OldPrice`=null  WHERE ItemType.category_id = $item_id";
                                                    $stmt3 = $db->prepare($sql3);
                                                    $stmt3->execute();

                                                    $sql3 = "UPDATE `category_items_list` SET `discount`=0,offer_price=0  WHERE  category_id = $item_id";
                                                    $stmt3 = $db->prepare($sql3);
                                                    $stmt3->execute();
                                                    if($_POST['Delivery_free_type'] &&  $_POST['Delivery_free_type'] != 0){

                                                            $sql3N = "UPDATE `category_items_list` SET Deliveryfree='N'  WHERE  category_id = $item_id";
                                                            $stmt3N = $db->prepare($sql3N);
                                                            $stmt3N->execute();

                                                    }



                                                
                                                
                                                }
                                            }

      
        $sql = "DELETE  FROM `offer` WHERE  offer_id=$offerID";
        $stmt = $db->prepare($sql);

         if($stmt->execute()){

           $sql2="DELETE FROM `ItemOFFER` WHERE offerID=$offerID";
           $stmt2 = $db->prepare($sql2);

           if($stmt2->execute()){

               $sql33="DELETE FROM `offerDays` WHERE `offerID` =$offerID";
               $stmt33=$db->prepare($sql33);
               if($stmt33->execute()){
                  
               }else{
                
               }


         }

        


   
 
 
      }
      }
      
      ?>