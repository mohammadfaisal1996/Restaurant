<?php
ob_start();
include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();
?>



<?php

$sql="";


if( $_GET['type'] == 'basic'){

    
                       $sql = "SELECT `ordersMaster`.OrderNumber,`ordersMaster`.delivery_option,`ordersMaster`.mobile_number,`ordersMaster`.comments,`ordersMaster`.order_id,`ordersMaster`.user_id,`ordersMaster`.order_status,`ordersMaster`.order_type FROM `ordersMaster`    ORDER BY `ordersMaster`.`order_id` ASC ";

}else if( $_GET['type']=="fromto"){
 

        $from = $_GET["from"];
        $to = $_GET["to"];
        $Temp1=$from." 00:00:00";
        $Temp2=$to." 23:59:59";

   $sql="
SELECT `ordersMaster`.OrderNumber,`ordersMaster`.delivery_option,`ordersMaster`.mobile_number,`ordersMaster`.comments,`ordersMaster`.order_id,`ordersMaster`.user_id,`ordersMaster`.order_status,`ordersMaster`.order_type FROM `ordersMaster` where  `ordersMaster`.order_date_time BETWEEN '$Temp1' AND '$Temp2'    ORDER BY `ordersMaster`.`order_id` ASC ";
}



$value="<th >Order Number</th><th>Ordered by</th><th>status</th><th>Order Type</th><th>mobile_number</th><th>comments</th>";

                        
                           $stmt = $db->prepare($sql);
                     
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();

                            if ($itemCount > 0) {

                                while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                 
                                   if($row["order_status"] == 5)
                                   {
                                       $s = "delivered";
                                   }
                                   else if($row["order_status"] == 6)
                                   {
                                       $s = "Rejected";
                                   }
                                   else if($row["order_status"] == 7)
                                   {
                                       $s = "Ready";
                                   }
                                   else if($row["order_status"] == 1)
                                   {

                                       $s = "Pending";
                                   }
                                   else if($row["order_status"] == 2)
                                   {
                                       $s = "Accepted";
                                   }
                                   else if($row["order_status"] == 3)
                                   {
                                       $s = "Prepared";
                                   }
                                   else if($row["order_status"] == 4)
                                   {
                                       $s = "On The Way";
                                   }
                                   
                                                                          
                                    if($row["delivery_option"] == 1)
                                    {
                                        $t = "Delivery";
                                    }elseif($row["delivery_option"] == 2){
                                    $t = " pick up";

                            
                                    }else{
                                    $t = "dai in booking";

                                    }

?>



                                            <?php 
                                            
                                            
                                            
                                            $value=$value."<tr><th>".$row['OrderNumber']."</th><th>".$row['user_id']."</th><th>".$s."</th><th>".$t."</th><th>".$row['mobile_number']."</th><th>".$row['comments']."</th></tr>";

                                            





                                }
                            }

                 

$file="orders.xls";

$test = <<<excel
<table>
$value
</table>
excel;

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
echo $test;

                        ?>
    
     


