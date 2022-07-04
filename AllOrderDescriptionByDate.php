
      <?php include('include/header.php') ?>
      
                           
                           
      <div class="main-panel">
			<div class="content">
				<div class="page-inner">


					<div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
                        
                        <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class=""></i>
                            </li>


					
							<li class="nav-item" style="font-weight: bold;" >
								<a href="index.php" >Back</a>
							</li>
                        </ul>
                        
						<div class="btn-group btn-group-page-header ml-auto">

							<div class="dropdown-menu">
								<div class="arrow"></div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div>
					</div>


                           
                           
                           
                           
                                <!-- search by date  -->
                            <div class="row">
                            <div class="col-md-12">
                            <div class="card">
                            <div class="card-header card-header-warning">


                            <div class="col-12 makeBLack customColor  " > 
                            <br><h4 class="card-title ">Dashboard review by date</h4><br>
                            <input class="form-control" id="myInput3" type="text" placeholder="Search..">
                <br>
                          </div>
                            

                       
                            <table class="table table-hover">
                      <thead class=" text-secondary">
                        <th>Order ID</th>
                        <th>Order Number</th>
                        <th>User ID</th>
                        <th>Mobile Number</th>
                        <th>Order Date</th>
                        <th>Order Type</th>
                 
                        <th>Coupon Offer</th>
                   
                        <th>Payment Option</th>
                        <th>Rejected Reason</th>
                        <th>Order Ration</th>
                        <th>Delivery Ration</th>
                      </thead>
                      <tbody id="myTable3">
                          <?php
                           include_once  __DIR__ . '/connectionDb.php';
                           $database = new connectionDb();
                           $db = $database->getConnection();
                           
                           $branch_Id=$_GET['branch_Id'];

               
                       


                          if(isset($_GET['branch_Id']) && isset($_GET['from']) && isset($_GET['to'])){

                            
                            $from=$_GET['from'];
                            $to=$_GET['to'];
  
                            $sql = "SELECT `order_id`, `OrderNumber`,`user_id`, `mobile_number`,  `order_date_time`, `order_type`,  `coupon_offer_value`, `payment_option`,  `rejected_reason`, `order_rating`, `delivery_rating` FROM  BlueFigDb.ordersMaster WHERE   branch_id='$branch_Id' and order_date_time BETWEEN '$from' AND '$to' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();
  
                            if ($itemCount > 0) {
  
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
                              echo "<tr><th>" . $row["order_id"]. "</th><th>". $row["OrderNumber"]. "</th><th>".$row["mobile_number"]."</th>" ."<th>".$row["order_date_time"]."</th><th>".$row["order_type"]."</th>"."<th>".$row["coupon_offer_value"]."</th>"."<th>".$row["payment_option"]."</th><th>";?><?php echo $row["rejected_reason"]== "" ? "empty" : $row["rejected_reason"];?><?php echo "</th><th>";?><?php echo $row["order_rating"]==""?"empty":$row["order_rating"]?><?php echo "</th><th>";?><?php echo $row["delivery_rating"]==""?"empty":$row["delivery_rating"];?><?php echo "</th></tr>";
  
  
  
                            }
  
                            } 
                          }elseif(isset($_GET['today1']) && isset($_GET['today2'])){
                            
                            $today1=$_GET['today1'];
                            $today2=$_GET['today2'];


                            $sql = "SELECT `order_id`, `OrderNumber`,`user_id`, `mobile_number`,  `order_date_time`, `order_type`,  `coupon_offer_value`, `payment_option`,  `rejected_reason`, `order_rating`, `delivery_rating` FROM  BlueFigDb.ordersMaster WHERE   branch_id='$branch_Id' and order_date_time BETWEEN '$today1' AND '$today2' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();
  
                            if ($itemCount > 0) {
  
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
                              echo "<tr><th>" . $row["order_id"]. "</th><th>". $row["OrderNumber"]. "</th><th>".$row["mobile_number"]."</th>" ."<th>".$row["order_date_time"]."</th><th>".$row["order_type"]."</th>"."<th>".$row["coupon_offer_value"]."</th>"."<th>".$row["payment_option"]."</th><th>";?><?php echo $row["rejected_reason"]== "" ? "empty" : $row["rejected_reason"];?><?php echo "</th><th>";?><?php echo $row["order_rating"]==""?"empty":$row["order_rating"]?><?php echo "</th><th>";?><?php echo $row["delivery_rating"]==""?"empty":$row["delivery_rating"];?><?php echo "</th></tr>";
  
  
  
                            }
  
                            }

                          }elseif(isset($_GET['today'])){
                            
                            $today1=$_GET['today'];
                         


                            $sql = "SELECT `order_id`, `OrderNumber`,`user_id`, `mobile_number`,  `order_date_time`, `order_type`,  `coupon_offer_value`, `payment_option`,  `rejected_reason`, `order_rating`, `delivery_rating` FROM  BlueFigDb.ordersMaster WHERE   branch_id='$branch_Id' and order_date_time = '$today1' ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();
  
                            if ($itemCount > 0) {
  
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
                              echo "<tr><th>" . $row["order_id"]. "</th><th>". $row["OrderNumber"]. "</th><th>".$row["mobile_number"]."</th>" ."<th>".$row["order_date_time"]."</th><th>".$row["order_type"]."</th>"."<th>".$row["coupon_offer_value"]."</th>"."<th>".$row["payment_option"]."</th><th>";?><?php echo $row["rejected_reason"]== "" ? "empty" : $row["rejected_reason"];?><?php echo "</th><th>";?><?php echo $row["order_rating"]==""?"empty":$row["order_rating"]?><?php echo "</th><th>";?><?php echo $row["delivery_rating"]==""?"empty":$row["delivery_rating"];?><?php echo "</th></tr>";
  
  
  
                            }
  
                            }

                          }
                          
                          else{



                            $sql = "SELECT `order_id`, `OrderNumber`,`user_id`, `mobile_number`,  `order_date_time`, `order_type`,  `coupon_offer_value`, `payment_option`,  `rejected_reason`, `order_rating`, `delivery_rating` FROM  BlueFigDb.ordersMaster WHERE   branch_id='$branch_Id'  ";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $itemCount = $stmt->rowCount();
  
                            if ($itemCount > 0) {
  
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
                            echo "<tr><th>" . $row["order_id"]. "</th><th>". $row["OrderNumber"]. "</th><th>".$row["mobile_number"]."</th>" ."<th>".$row["order_date_time"]."</th><th>".$row["order_type"]."</th>"."<th>".$row["coupon_offer_value"]."</th>"."<th>".$row["payment_option"]."</th><th>";?><?php echo $row["rejected_reason"]== "" ? "empty" : $row["rejected_reason"];?><?php echo "</th><th>";?><?php echo $row["order_rating"]==""?"empty":$row["order_rating"]?><?php echo "</th><th>";?><?php echo $row["delivery_rating"]==""?"empty":$row["delivery_rating"];?><?php echo "</th></tr>";
  
  
  
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
                           
                           
                                              <!-- get data  -->


      
          <?php include('include/footer.php') ?>

          <script>


          $("#myInput3").on("keyup", function() {      
          var value = $(this).val().toLowerCase();
          $("#myTable3 tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });

          });
          </script>