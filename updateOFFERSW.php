<?php
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();
      if(isset($_POST['OFFERID'])&&isset($_POST['status'])&&isset($_POST['discount'])){
          
        $OFFERID=$_POST['OFFERID'];
         $status=$_POST['status'];
         $discount=$_POST['discount'];

         
        $sql = "UPDATE `offer` SET `offer_status`=$status  WHERE `offer_id`=$OFFERID";
        $stmt = $db->prepare($sql);
        if($stmt->execute()){

                
                                   $sqlGetItems="SELECT itemid,item_price  FROM `ItemOFFER` where offerID =$OFFERID";
                                   $stmtGetItems = $db->prepare($sqlGetItems);
                                   if($stmtGetItems->execute()){

                                                while($row = $stmtGetItems->fetch(PDO::FETCH_ASSOC)) {
                                                    
                                                $item_id=$row['itemid'];
                                                $priceAfterDiscount=$row['item_price'];

                                               



                                                if($status == 0){

                                                        $sql2 = "UPDATE `category_items_list` SET `discount`=0,`offer_price`=0  WHERE  category_id = $item_id ";
                                                        $stmt2 = $db->prepare($sql2);
                                                        $stmt2->execute();
                                                        echo "update status 1 $item_id   offer : $discount  <br>";

                                                        
                                                }else{

                                                       $priceAfterDiscount=(1-$discount/100)*$priceAfterDiscount; 
                                                        
                                                        
                                                        $sql3 = "UPDATE `category_items_list` SET `discount`=$discount ,`offer_price`=$priceAfterDiscount  WHERE  category_id = $item_id";
                                                        $stmt3 = $db->prepare($sql3);
                                                        $stmt3->execute();
                                                        echo "update status 0 $item_id  offer : $discount <br>";

                                                }





                                                }



                                    }
                                
               
                            

                                
                
          




      }

      }
      
      ?>