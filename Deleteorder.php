<?php
ob_start();
      include_once  __DIR__ . '/connectionDb.php';
      $database = new connectionDb();
      $db = $database->getConnection();

      if(isset($_POST['Delete1'])&&isset($_POST['Delete2'])){






          
         $Delete1=$_POST['Delete1'];
         $Delete2=$_POST['Delete2'];

      
    
         

        
       

         $sql = "DELETE FROM `ordersMaster` where OrderNumber=$Delete1";
        
        $stmt = $db->prepare($sql);
        if($stmt->execute()){
             $sql2 = "DELETE FROM `order_item`   where order_id='$Delete2'";
             $stmt2 = $db->prepare($sql2);
                if($stmt2->execute()){
                    

              

              



                        $url = 'http://node.bluefig.digisolapps.com:8025/DeleteOrder';



                        //The JSON data.
                        $jsonData = array(
                        
                        );




                        $options = array(

                        'http' => array(
                        'method'  => 'POST',
                        'content' => json_encode(['order_number' =>  $Delete2]),
                        'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
                        )
                        
                    );

                        $context  = stream_context_create( $options );
                        


            }else {
             
            }

        }





   

      }

    
      
      ?>