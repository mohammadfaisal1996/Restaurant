<?php include('include/header.php') ?>

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
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Order table</h4><br>
                                    <input class="form-control" id="myInput4" type="text" placeholder="Search..">
                <br>    
                                </div>
            
                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                    <table class="table">
                      <thead class=" text-secondary">
                        <th>Order ID</th>
                        <th>Item Name</th>
                 
                        <th>Order Date Time</th>
                        <th>item  price</th>  
                        <th>quantity</th>  
                        <th>Payment Method</th>
                        <th>Delivery Price</th>
                        <th>Delivery Time</th>
                        <th>Delivery Rate</th>
                        <th>Order Rate</th>
                        <th>Rejected Reason</th>
                        <th>Tax</th>
                        
                        
                        
                      </thead>
                      <tbody id="myTable4">
                          <?php 
                                $desc = $_GET["order_id"];
                                
                                include_once  __DIR__ . '/connectionDb.php';
                                $database = new connectionDb();
                                $db = $database->getConnection();
                                
                                $s = "";
      

                                $sql = "SELECT DISTINCT
                                `ordersMaster`.order_id,
                                `ordersMaster`.payment_option,
                                `ordersMaster`.pickup_delivery_date_time,
                                `ordersMaster`.delivery_rating,
                                `ordersMaster`.rejected_reason,
                                `ordersMaster`.order_rating,
                                `ordersMaster`.delivery_fee,
                                `ordersMaster`.order_date_time,
                                order_item.item_name ,
                                order_item.quantity ,
                                category_items_list.item_price ,
                                
                                
                                `ordersMaster`.tax 
                                
                                from `ordersMaster`  JOIN order_item on order_item.order_id=ordersMaster.order_id join category_items_list on category_items_list.category_id=order_item.item_id  WHERE  ordersMaster.order_id = '$desc'";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();
                                $itemCount = $stmt->rowCount();
                                
                                
                                
                                if ($itemCount > 0) {

                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                                     
                                        if($row["payment_option"] == 0)
                                       {
                                           $s = "Cash On Delivery";
                                       }
                                       else if($row["payment_option"] == 1)
                                       {
                                           $s = "Online";
                                       }
                                       else{
                                           $s = "-";
                                       }
                                     
                                
                                       
                                    echo "<tr><th>" . $row["order_id"]. "</th><th>". $row["item_name"]. "</th><th> ".$row["order_date_time"]."</th><th>".$row["item_price"] ." JOD</th><th>".$row['quantity']."</th><th>".$s."</th><th>".$row["delivery_fee"]."  JOD</th><th>".$row["pickup_delivery_date_time"]."</th><th>"?><?php if(!empty($row["delivery_rating"])){echo  $row["delivery_rating"];}else{echo "-";}?><?php echo "</th><th>"?><?php if(!empty($row["order_rating"])){echo $row["order_rating"];}else{ echo "-";}?><?php echo"</th><th>"?><?php if(!empty($row["rejected_reason"])){echo $row["rejected_reason"];}else{echo "-";}?><?php echo"</th><th>".$row["tax"] ."</th></tr>";

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




<?php include('include/footer.php') ?>

<script>


$("#myInput4").on("keyup", function() {      
var value = $(this).val().toLowerCase();
$("#myTable4 tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});

});
</script>