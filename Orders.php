<?php include('include/header.php') ?>
ob_start();
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Orders</h4>
                        
                        <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
                            </li>
							<li class="nav-item" >
								<a href="index.php" >Dashboard</a>
							</li>

                                  </li>
							<li class="nav-item" >
                                           
							   <button  id="ResetOrdernumber" type="submit" class="btn btn-primary" >Reset order number <i class="fas fa-redo-alt"></i></a></button>

							</li>


                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Order table</h4>
                                    
                                       <form  action="downloadOrder.php">
                         
                            <?php if(isset($_POST['from'])&&isset($_POST['to'])){?>

                            <input type="hidden" value="fromto" name="type">
                            <input type="hidden" value="<?php echo $_POST['from'] ?>" name="from">
                            <input type="hidden" value="<?php echo $_POST['to'] ?>" name="to">



                         <button type="submit"  class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff" ><i class="fas fa-file-download fa-3x "></i></button>

                         <?php
                         }else{?>

                         <input type="hidden" value="basic" name="type">
                     


                         <button type="submit" class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff" ><i class="fas fa-file-download fa-3x "></i></button>
                         
                         
                          <?php   
                         }
                         ?>
                         
                         
                         </form>
                                    <br>
                                    <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                                    </div>
                                    

       
                        <form method="post" style="display: inline-block;" ><br>
                        <h6>Sort Date</h6>
                        <label style="color:white"> From - &emsp;</label>
                        <input name="from" type="date" id="date-input" required class="btn btn-primary" /> 
                        <label style="color:white">&emsp; To - 
                         <input name="to" type="date" id="date-input-two" required class="btn btn-primary" />&emsp;</label>&emsp;<button name="sort_list" onclick="getDate()"  class="btn btn-primary pull-center">Get Date</button>
                         

                   
                         </form>


                         <form  method='post' class="ml-4"style="display: inline-block;">
                         Status:
                         <select class='form-group' name="filterStatus"  onchange='this.form.submit()'>">
                         <option >select One</option>
                         <?php $status=array("All"=>"All",5=>"delivered",7=>"Ready",1=>"Pending",6=>"Rejected",2=>"Accepted",3=>"Prepared",4=>"On The Way"); 
                            
                            foreach($status as $key => $value){
                             ?>
                             <option value="<?php echo $key ?>"><?php echo $value ?></option>
                             <?php
                            }
                         ?>
                         
                         </select>


               
                         
                         </form>

                      
                    
                       
                  </div>

                                    <div class="card-body">
                    <div class="table" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                        <th>Order Number</th>
                        <th>Ordered by</th>
                        <th>status</th>
                        <th>Order Type</th>
                         <th>mobile_number</th>
                        <th>comments</th>
                        <th>action</th>

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                            
                      
                       
                           if(isset($_POST["sort_list"]))
                                      {
                                         
                                          $from = $_POST["from"];
                                          $to = $_POST["to"];
                                          $Temp1=$from." 00:00:00";
                                          $Temp2=$to." 23:59:59";
                                           
                            
                                          include_once  __DIR__ . '/connectionDb.php';
                                          
                                          $database = new connectionDb();
                                          $db = $database->getConnection();
                                         


                                        
                     $sql = "SELECT `ordersMaster`.OrderNumber,`ordersMaster`.delivery_option,`ordersMaster`.mobile_number,`ordersMaster`.comments,`ordersMaster`.order_id,`ordersMaster`.user_id,`ordersMaster`.order_status,`ordersMaster`.order_type FROM `ordersMaster` where  `ordersMaster`.order_date_time BETWEEN '$Temp1' AND '$Temp2' and  where order_status != 0  ORDER BY `ordersMaster`.`order_id` ASC ";
                      
                         $stmt = $db->prepare($sql);
                          $stmt->execute();
                          $itemCount = $stmt->rowCount();
                          if ($itemCount > 0) {

                              while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                             


                                 switch($row["order_status"]){

                                    case 5:
                                     $s = "delivered";
                                    break;
                                        case 6:
                                     $s = "Rejected";
                                    break;
                                        case 7:
                                       $s = "Ready";
                                    break;
                                        case 1:
                                      $s = "Pending";
                                    break;
                                        case 2:
                                     $s = "Accepted";
                                    break;
                                        case 3:
                                      $s = "Prepared";
                                    break;

                                    case 4:
                                    $s = "On The Way";
                                    break;
                                    default:
                                       break;

                                 }

                                    switch($row["delivery_option"]){

                                        case 1:
                                        $t = "Delivery";
                                        break;
                                           case 2:
                                      $t = " pick up";
                                        break;
                                       

                                        default:

                                        $t = "dai in booking";

                                    }

                                 
       

                                 ?>
                                 <tr class="D<?php echo $row['order_id'] ?>"><?php echo"<th>".$row['OrderNumber']. "</th><th>"?><?php echo $row['user_id']?><?php echo"</th><th>"?><?php
                                              echo "<form method='post'>";
                                              ?>
                                              
                                              <input type='hidden' name='orderid' value='<?php echo $row["order_id"] ?>'>
       
                                              <input type='hidden' name='orderNumber' value='<?php echo $row["OrderNumber"] ?>'>
                                              <input type='hidden' name='token' value='<?php echo $row['user_token'] ?>'>
                                              <input type='hidden' name='ordarStatus' value='<?php echo $s ?>'>
       
       
                                             <?php
                                              echo "<select  class='form-group' name='orderstat'  onchange='this.form.submit()'>";
                                                switch($s){
                                                        case "Pending":
                                                        ?>
                                                        <option value=1>Pending</option>
                                                        <option value=2>Accepted</option>
                                                        <option value=6>Rejected</option>
                                                        <option value=3>Prepared</option>
                                                        <option value=7>Ready</option>

                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option>

                                                        <?php
                                                        break;


                                                        case "Rejected":
                                                        ?>
                                                        <option value=6>Rejected</option>
                                                        <?php
                                                        break;
                                                        
                                                        case "Accepted":
                                                        ?>
                                                        <option value=2>Accepted</option>
                                                        <option value=3>Prepared</option>   
                                                        <option value=7>Ready</option>   
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option> 
                                                        <?php
                                                        break;


                                                        case "delivered":
                                                        ?>
                                                        <option value=5>delivered</option>

                                                        <?php
                                                        break;

                                                        case "Prepared":
                                                        ?>
                                                        <option value=3>Prepared</option>   
                                                        <option value=7>Ready</option>   
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option> 

                                                        <?php
                                                        break;



                                                        case "On The Way":
                                                        ?>
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option>  

                                                        <?php
                                                        break;

                                                        case "Ready":
                                                        ?>
                                                        <option value=7>Ready</option>   
                                                        <option value=4>On The Way</option>     

                                                        <?php
                                                        break;

                                                }
                                              echo "</select>";
                                              echo "</form>";
                                              ?><?php echo"</th><th>".$t."</th><th>".$row['mobile_number']."</th><th>".$row['comments']."</th>";?>

                                              <th><a href="OrderDetailsTwo.php?order_id=<?php echo $row["order_id"]?>" class="btn btn-primary">
                                              <i style="color:black" class="fas fa-eye fa-lg"></i></a>

                                              <form onsubmit="return false" style="    display: inline-block !important;">
                                                <button id="<?php echo $row['order_id'] ?>" class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn('<?php echo $row['OrderNumber'] ?>','<?php echo $row['order_id'] ?>')"><i class="fas fa-trash-alt fa-lg"></i></button>
                                              </form>
                                              </th>
                                              </tr>
                                              <?php    
             
                                               }
                                        
                                           }
                                      }elseif(isset($_POST['filterStatus'])){

                                             $status=$_POST['filterStatus'];



                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();




                                            if($_POST['filterStatus'] != "All"){
                                                $sql = "SELECT `ordersMaster`.OrderNumber,`ordersMaster`.delivery_option,`ordersMaster`.mobile_number,`ordersMaster`.comments,`ordersMaster`.order_id,`ordersMaster`.user_id,`ordersMaster`.order_status,`ordersMaster`.order_type FROM `ordersMaster`  where  `ordersMaster`.order_status=$status   ORDER BY `ordersMaster`.`order_id` ASC ";

                                            }else{
                                                $sql = "SELECT `ordersMaster`.OrderNumber,`ordersMaster`.delivery_option,`ordersMaster`.mobile_number,`ordersMaster`.comments,`ordersMaster`.order_id,`ordersMaster`.user_id,`ordersMaster`.order_status,`ordersMaster`.order_type FROM `ordersMaster` where order_status != 0  ORDER BY `ordersMaster`.`order_id` ASC ";

                                            }

                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                 

                                switch($row["order_status"]){

                                    case 5:
                                     $s = "delivered";
                                    break;
                                        case 6:
                                     $s = "Rejected";
                                    break;
                                        case 7:
                                       $s = "Ready";
                                    break;
                                        case 1:
                                      $s = "Pending";
                                    break;
                                        case 2:
                                     $s = "Accepted";
                                    break;
                                        case 3:
                                      $s = "Prepared";
                                    break;

                                    case 4:
                                    $s = "On The Way";
                                    break;
                                     case 2:
                                    $s = "Accepted";
                                    break;
                                    default:
                                       break;

                                 }

                                    switch($row["delivery_option"]){

                                        case 1:
                                        $t = "Delivery";
                                        break;
                                           case 2:
                                      $t = " pick up";
                                        break;
                                       

                                        default:

                                        $t = "dai in booking";

                                    }

                                            ?>
                                            <tr class="D<?php echo $row['OrderNumber'] ?>"><?php echo"<th>".$row['OrderNumber']. "</th><th>"?><?php echo$row['user_id']?><?php echo"</th><th>"?><?php
                                            echo "<form method='post'>";
                                            ?>

                                            <input type='hidden' name='orderid' value='<?php echo $row["order_id"] ?>'>

                                            <input type='hidden' name='orderNumber' value='<?php echo $row["OrderNumber"] ?>'>
                                              <input type='hidden' name='token' value='<?php echo $row['user_token'] ?>'>
                                            <input type='hidden' name='ordarStatus' value='<?php echo $s ?>'>


                                            <?php
                                            echo "<select  class='form-group' name='orderstat'  onchange='this.form.submit()'>";
                                     switch($s){
                                                        case "Pending":
                                                        ?>
                                                        <option value=1>Pending</option>
                                                        <option value=6>Rejected</option>
                                                        <option value=3>Prepared</option>
                                                        <option value=2>Accepted</option>
                                                        <option value=7>Ready</option>
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option>

                                                        <?php
                                                        break;


                                                        case "Rejected":
                                                        ?>
                                                        <option value=6>Rejected</option>
                                                        <?php
                                                        break;


                                                        case "delivered":
                                                        ?>
                                                        <option value=5>delivered</option>

                                                        <?php
                                                        break;

                                                        case "Prepared":
                                                        ?>
                                                        <option value=3>Prepared</option>   
                                                        <option value=7>Ready</option>   
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option> 

                                                        <?php
                                                        break;

                                                        case "Accepted":
                                                        ?>
                                                        <option value=2>Accepted</option>
                                                        <option value=3>Prepared</option> 
                                                        <?php
                                                        break;

                                                        case "On The Way":
                                                        ?>
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option>  

                                                        <?php
                                                        break;

                                                        case "Ready":
                                                        ?>
                                                        <option value=7>Ready</option>   
                                                        <option value=4>On The Way</option>     

                                                        <?php
                                                        break;

                                                }
                                            echo "</select>";
                                            echo "</form>";
                                            ?><?php echo"</th><th>".$t."</th><th>".$row['mobile_number']."</th><th>".$row['comments']."</th>";?>

                                            <th><a href="OrderDetailsTwo.php?order_id=<?php echo $row["order_id"]?>" class="btn btn-primary">
                                            <i style="color:black" class="fas fa-eye fa-lg"></i></a>

                                            <form onsubmit="return false" style="    display: inline-block !important;">
                                            <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn('<?php echo $row['OrderNumber'] ?>','<?php echo $row['order_id'] ?>')"><i class="fas fa-trash-alt fa-lg"></i></button>
                                            </form>
                                            </th>
                                            </tr>

                                            <?php   
                                            
                                            }
                                            }







                                      }
                                      else {
                                            $s = "";
                                            $t = "";
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();
                                           



                                                    $sql = "SELECT `ordersMaster`.OrderNumber,`ordersMaster`.delivery_option,`ordersMaster`.mobile_number,`ordersMaster`.comments,`ordersMaster`.order_id,`ordersMaster`.user_id,`ordersMaster`.order_status,`ordersMaster`.order_type FROM `ordersMaster`  where order_status !=0   ORDER BY `ordersMaster`.`order_id` ASC ";
                                                                        
                                                                $stmt = $db->prepare($sql);
                                                                    $stmt->execute();
                                                                    $itemCount = $stmt->rowCount();

                                                                    if ($itemCount > 0) {

                                                                        while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                        
                                                                            switch($row["order_status"]){

                                    case 5:
                                     $s = "delivered";
                                    break;
                                        case 6:
                                     $s = "Rejected";
                                    break;
                                        case 7:
                                       $s = "Ready";
                                    break;
                                        case 1:
                                      $s = "Pending";
                                    break;
                                        case 2:
                                     $s = "Accepted";
                                    break;
                                        case 3:
                                      $s = "Prepared";
                                    break;

                                    case 4:
                                    $s = "On The Way";
                                    break;
                                   default:
                                       break;

                                 }

                                    switch($row["delivery_option"]){

                                        case 1:
                                        $t = "Delivery";
                                        break;
                                           case 2:
                                      $t = " pick up";
                                        break;
                                       

                                        default:

                                        $t = "dai in booking";

                                    }
                                            
                                                                        ?>
                                               <tr class="D<?php echo $row['OrderNumber'] ?>"><?php echo"<th>".$row['OrderNumber']. "</th><th>"?><?php echo $row['user_id']?><?php echo"</th><th>"?><?php
                                                echo "<form method='post'>";
                                                ?>
                                                
                                                <input type='hidden' name='orderid' value='<?php echo $row["order_id"] ?>'>
         
                                                <input type='hidden' name='orderNumber' value='<?php echo $row["OrderNumber"] ?>'>
                                              <input type='hidden' name='token' value='<?php echo $row['user_token'] ?>'>
                                                <input type='hidden' name='ordarStatus' value='<?php echo $s ?>'>
         
         
                                               <?php
                                                echo "<select  class='form-group' name='orderstat'  onchange='this.form.submit()'>";
                                                
                                                
                                                switch($s){
                                                        case "Pending":
                                                        ?>
                                                        <option value=1>Pending</option>
                                                        <option value=6>Rejected</option>
                                                        <option value=3>Prepared</option>
                                                        <option value=7>Ready</option>
                                                        <option value=2>Accepted</option>
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option>

                                                        <?php
                                                        break;


                                                        case "Rejected":
                                                        ?>
                                                        <option value=6>Rejected</option>
                                                        <?php
                                                        break;


                                                        case "delivered":
                                                        ?>
                                                        <option value=5>delivered</option>

                                                        <?php
                                                        break;

                                                        case "Prepared":
                                                        ?>
                                                        <option value=3>Prepared</option>   
                                                        <option value=7>Ready</option>   
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option> 

                                                        <?php
                                                        break;



                                                        case "On The Way":
                                                        ?>
                                                        <option value=4>On The Way</option>
                                                        <option value=5>delivered</option>  

                                                        <?php
                                                        break;

                                                        case "Ready":
                                                        ?>
                                                        <option value=7>Ready</option>   
                                                        <option value=4>On The Way</option>     

                                                        <?php
                                                        break;
                                                        case "Accepted":
                                                        ?>
                                                        <option value=2>Accepted</option>
                                                        <option value=3>Prepared</option>   
                                                        <?php
                                                        break;
                                        

                                                }
                                  
                                                echo "</select>";
                                                echo "</form>";
                                                ?><?php echo"</th><th>".$t."</th><th>".$row['mobile_number']."</th><th>".$row['comments']."</th>";?>

                                                <th><a href="OrderDetailsTwo.php?order_id=<?php echo $row["order_id"]?>" class="btn btn-primary">
                                                <i style="color:black" class="fas fa-eye fa-lg"></i></a>

                                                <form onsubmit="return false" style="    display: inline-block !important;">
                                                <button id="<?php echo $row['order_id'] ?>" class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn('<?php echo $row['OrderNumber'] ?>','<?php echo $row['order_id'] ?>')"><i class="fas fa-trash-alt fa-lg"></i></button>
                                                </form>
                                                </th>
                                                </tr>
                                                <?php    
                                            
                                                    
                                                 }
                                          
                                             }


                                     
                      
                         }
                        ?>
                        
                      </tbody>
                      </table> 


</div>
</div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

<?php 


if(isset($_POST['orderstat'])){

   $orderstatus=$_POST['orderstat'];
   $orderid=$_POST['orderid'];

   $oStatus="Pending";
   $orderNumber=$_POST['orderNumber'];

   $token=$_POST['token'];



    $sql = "UPDATE `ordersMaster` set order_status=$orderstatus where order_id=$orderid ";
                                
    $stmt = $db->prepare($sql);
     if($stmt->execute()){


        switch($orderstatus){
            case 1: $oStatus="Pending";
            break;
            case 2: $oStatus="Accepted";
            break;
            case 3: $oStatus="Prepared";
            break;
            case 4: $oStatus="On the way";
            break;
            case 5: $oStatus="Delivered";
            break;
            case 6: $oStatus="Rejected";
            break;
            case 7: $oStatus="ready";
            break;

        }
   
        
        
        //API Url
            $url = 'http://node.bluefig.digisolapps.com:8025/orderStatus';

            // //Initiate cURL.
            // $ch = curl_init($url);

            //The JSON data.
            $jsonData = array(
                'orderst' =>  $oStatus,
                'token' =>$token,
                "ordernumber"=> $orderNumber,
                'order_id' => $orderid
            );

            // //Encode the array into JSON.
            // $jsonDataEncoded = json_encode($jsonData);

            // //Tell cURL that we want to send a POST request.
            // curl_setopt($ch, CURLOPT_POST, 1);

            // //Attach our encoded JSON string to the POST fields.
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

            // //Set the content type to application/json
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

            // //Execute the request
            // $result = curl_exec($ch);


            $options = array(
                'http' => array(
                  'method'  => 'POST',
                  'content' => json_encode( $jsonData ),
                  'header'=>  "Content-Type: application/json\r\n" .
                              "Accept: application/json\r\n"
                  )
              );
              
              $context  = stream_context_create( $options );
              $result = file_get_contents( $url, false, $context );
              $response = json_decode( $result );


        header("Location:Orders.php");
        unset($_POST['orderstat']);
        unset($_POST['orderid']);
        

     }


}




?>


<?php include('include/footer.php') ?>
<!-- <script>
$("#orderStatus").on("change",function(){


});




</script> -->


<script>


function  funn(deletesql,ordernumber){

swal({
  title: "Are you sure?",
  text: "It will permanently deleted!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   
    


    $.ajax({
type: "POST",
url:"Deleteorder.php",
data:{"Delete1":deletesql,"Delete2":ordernumber}, // serializes the form's elements.
success: function(data)
{
  
    $(".D"+deletesql).fadeOut("slow"); // show response from the php script.
}
}).then(function(){
 

              swal("This record has been deleted.!", {
              icon: "success",
              });
              

        });




  } 
});



}


$('#ResetOrdernumber').click(function(){


        $.ajax({
type: "POST",
url:"ResetOrderNumber.php",
data:{"update":'resetOrder'}, // serializes the form's elements.
success: function(data)
{
     // show response from the php script.
}
}).then(function(){
 

              swal("Reset Order Number Success.!", {
              icon: "success",
              });
              

        });


});
 
 $("#myInput1").on("keyup", function() {      
 var value = $(this).val().toLowerCase();
 $("#myTable1 tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
 });

 });


 


</script>
        