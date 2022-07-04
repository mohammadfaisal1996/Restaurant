<?php include('include/header.php') ?>

<?php include("security/security.php");

 ?>

<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>


<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>





<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>



<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- DateTimePicker -->
<script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Select2 -->
<script src="assets/js/plugin/select2/select2.full.min.js"></script>
<!-- Bootstrap Tagsinput -->
<script src="assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>





<script>
            document.write(new Date());
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            document.cookie = 'date_today' + '=' +escape( today ) + '; expires=Fri, 27 Jul 2021 02:47:11 UTC; path=/';
            </script>


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
								<a href="AddBranches.php" >Add Branches</a>
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
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center btn-default bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0 icon-preview"  >
											<div class="numbers">
												<p class="card-category">Total user</p>
												<h4 class="card-title" style="color:black">  
                                                        <?php
                                                        $count=0;
 
                                                    $json = file_get_contents('http://node.bluefig.digisolapps.com:8025/getUsers?userType=user');
                                                    $obj = json_decode($json);
                                                    foreach($obj as $data){
                                                        $count++;
                                                    }
                                                    echo $count;
                                                    



                                

                                                    ?>
                                                
                                                </h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center btn-default bubble-shadow-small">
                                            <i class="fas fa-store-alt"></i>											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0 icon-preview">
											<div class="numbers">
												<p class="card-category">Total Branches</p>
												<h4 class="card-title" style="color:black">
                                                    <?php

                                                    include_once  __DIR__ . '/connectionDb.php';
                                                    $database = new connectionDb();
                                                    $db = $database->getConnection();

                                                    $sqlQ333 = "SELECT COUNT(serial_no) FROM `branches_store`";
                                                    $stmt22 = $db->prepare($sqlQ333);
                                                    $stmt22->execute();

                                                    while ($row = $stmt22->fetch(PDO::FETCH_NUM)) {
                                                    print $row[0];

                                                    }
                                                    ?>
                                                
                                                </h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center btn-default bubble-shadow-small">
												<i class="fas fa-dollar-sign"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0 icon-preview">
											<div class="numbers">
												<p class="card-category">Revenue</p>
												<h4 class="card-title" style="color:black">
                                                
                                                <?php

                                                include_once  __DIR__ . '/connectionDb.php';
                                                $database = new connectionDb();
                                                $db = $database->getConnection();

                                                $sqlQ123 = "SELECT SUM(total_price) FROM `ordersMaster` ";
                                                $stmt = $db->prepare($sqlQ123);
                                                $stmt->execute();

                                                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                                    echo ' $';
                                                    print $row[0]== 0 ?0:round($row[0]);
                                                
                                                }     

                                                ?>
                                                </h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center btn-default bubble-shadow-small">
											<i class="fas fa-box-open"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0 icon-preview">
											<div class="numbers">
												<p class="card-category">Orders</p>
												<h4 class="card-title" style="color:black">
                                                
                                                            <?php

                                                        include_once  __DIR__ . '/connectionDb.php';
                                                        $database = new connectionDb();
                                                        $db = $database->getConnection();

                                                        $sqlQ333333 = "SELECT count(order_id) FROM `ordersMaster` ";
                                                        $stmt = $db->prepare($sqlQ333333);
                                                        $stmt->execute();

                                                        $itemCount = $stmt->rowCount();

                                                        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                                                        print $row[0];

                                                        }
                                                            ?>
                                                </h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    
                            

                                                <!-- search by day  -->
					<div class="row">
						<div class="col-md-12">
                              <div class="card">
                                    <div class="card-header card-header-warning">

                                 
                                             <div class="col-12 makeBLack customColor  " > 
                                                  <br><h4 class="card-title ">Dashboard review by day</h4><br>
                                             </div>
                                                <form method="post" enctype="multipart/form-data">
                                                        <div class="col-sm-12 col-md-8 col-lg-4">
                                                            <div class="form-group">
                                                               <label style="color:white" >Select day  &emsp;</label>
                                                                <div class="input-group m-3">
                                                                    <input type="datetime-local" class="form-control"  name="datetime22">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </span>
                                                                    </div>
                                                                    <button type="submit" name="day" class="btn btn-primary pull-center ">Get Date</button>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </form>

                           
                                              <!-- get data  -->

                               
                                             <table class="table table-hover">
                                                        <thead>
                                                                <tr>
                                                                    <th>Total Orders</th>
                                                              
                                                                    <th>Delivered Order</th>
                                                                    <th>Rejected Orders</th>
                                                                    <th>Pending Order</th>
                                                                    <th>Prepared Order</th>
                                                                    <th>Ontheway Order</th>


                                                                    
                                                                    <th>Store Name</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php 
                                                        
                                    if(isset($_POST['day'])){
                                            

                                     
                                    $today33 = $_POST['datetime22'];
                        

                                    $getorderTime = "SELECT order_date_time FROM `ordersMaster`";
                                    $timeget = $db->prepare($getorderTime);
                                    $timeget->execute();



                                    $temp="";
                                    while($row333 = $timeget->fetch(PDO::FETCH_ASSOC)){

                                    $val=$row333['order_date_time'];
                                    $Date = strstr($val, ' ', true);
                                    $Date2 = strstr($today33,'T', true);
                                    if($Date == $Date2){
                                    $temp=$row333['order_date_time'];

                                    }

                                    }

                                    



                                    $ne="SELECT  DISTINCT branch_code , branch_name FROM branch_store_lang";
                                    $st = $db->prepare($ne);
                                    $st->execute();              

                                    while($ro = $st->fetch(PDO::FETCH_ASSOC)) {

                                    $bcode=$ro['branch_code'];


                                    $delivered = 0;
                                    $rejected = 0;
                                    $pending = 0;
                                    $Ontheway=0;
                                    $Prepared=0;



                                    $sq = "select ordersMaster.order_status from   BlueFigDb.ordersMaster where branch_id='$bcode' and order_date_time='$temp' ";
                                    $stm = $db->prepare($sq);
                                    $stm->execute();





                                    while($row23 = $stm->fetch(PDO::FETCH_ASSOC)) {

                                    if($row23["order_status"] == 5)
                                    {
                                        $delivered++;
                                    }
                                    else if($row23["order_status"] == 6)
                                    {
                                        $rejected++;
                                    }
                                    else if($row23["order_status"] == 1)
                                    {
                                        $pending++;
                                    }
                                    else if($row23["order_status"] == 3)
                                    {
                                        $Prepared++;
                                    }
                                    else if($row23["order_status"] == 4)
                                    {
                                        $Ontheway++;
                                    }


                                    }





                                    $sql222 = "SELECT  count(ordersMaster.order_id) as ff,ordersMaster.branch_id as branch_Id from BlueFigDb.ordersMaster where branch_id='$bcode' and order_date_time='$temp' ";
                                    $stmt222 = $db->prepare($sql222);
                                    $stmt222->execute();
                                    $itemCount222 = $stmt222->rowCount();



                                    if ($itemCount222 > 0) {



                                    while($row222 = $stmt222->fetch(PDO::FETCH_ASSOC)) {

                                    if($ro['branch_code'] == $row222['branch_Id']){
                                    ?>
                                    <tr><th>
                                    <form action="AllOrderDescriptionByDate.php" method="GET">

                                    <input type="hidden" value="<?php echo $row222['branch_Id'] ?>"  name="branch_Id">

                                    <input type="hidden" value="<?php echo $temp ?>"  name="today">



                                    <button type="submit"   class="btn" style="color:black:background-color:white" ><?php echo  $row222["ff"] ?></button>

                                    </form>
                                    </th>
                                    <?php
                                    echo "<th>" .$delivered. "</th><th>".$rejected."</th><th>"."$pending"."</th><th>"."$Prepared"."</th><th>"."$Ontheway"."</th><th>".$ro["branch_name"] ."</th></tr>";

                                    }

                                    }
                                    }

                                    }


                                    }else{

                                    if(isset($_COOKIE["date_today"])){
                                          
                                        $today1 = $_COOKIE["date_today"]." 00:00:00";
                                        $today2 = $_COOKIE["date_today"]." 23:59:59";
                                    }else{
                                        $now=date('Y-m-d');

                                        $today1 =$now." 00:00:00";
                                        $today2 =$now." 23:59:59";

                                    }
                                   




                                    $ne="SELECT  DISTINCT branch_code , branch_name FROM branch_store_lang";
                                    $st = $db->prepare($ne);
                                    $st->execute();              

                                    while($ro = $st->fetch(PDO::FETCH_ASSOC)) {

                                    $bcode=$ro['branch_code'];


                                    $delivered = 0;
                                    $rejected = 0;
                                    $pending = 0;
                                    $Ontheway=0;
                                    $Prepared=0;



                                    $sq = "select ordersMaster.order_status from   BlueFigDb.ordersMaster where branch_id='$bcode' and order_date_time BETWEEN '$today1' AND '$today2'";
                                    $stm = $db->prepare($sq);
                                    $stm->execute();





                                    while($row23 = $stm->fetch(PDO::FETCH_ASSOC)) {

                                    if($row23["order_status"] == 5)
                                    {
                                    $delivered++;
                                    }
                                    else if($row23["order_status"] == 6)
                                    {
                                    $rejected++;
                                    }
                                    else if($row23["order_status"] == 1)
                                    {
                                    $pending++;
                                    }
                                    else if($row23["order_status"] == 3)
                                    {
                                    $Prepared++;
                                    }
                                    else if($row23["order_status"] == 4)
                                    {
                                    $Ontheway++;
                                    }


                                    }





                                    $sql222 = "SELECT  count(ordersMaster.order_id) as ff,ordersMaster.branch_id as branch_Id from BlueFigDb.ordersMaster where branch_id='$bcode' and order_date_time BETWEEN '$today1' AND '$today2' ";
                                    $stmt222 = $db->prepare($sql222);
                                    $stmt222->execute();
                                    $itemCount222 = $stmt222->rowCount();



                                    if ($itemCount222 > 0) {



                                    while($row222 = $stmt222->fetch(PDO::FETCH_ASSOC)) {

                                    if($ro['branch_code'] == $row222['branch_Id']){
                                    ?>
                                    <tr><th>
                                    <form action="AllOrderDescriptionByDate.php" method="GET">

                                    <input type="hidden" value="<?php echo $row222['branch_Id'] ?>"  name="branch_Id">

                                    <input type="hidden" value="<?php echo $today1 ?>"  name="today1">
                                    <input type="hidden" value="<?php echo $today2 ?>"  name="today2">




                                    <button type="submit"   class="btn" style="color:black:background-color:white" ><?php echo  $row222["ff"] ?></button>

                                    </form>
                                    </th>
                                    <?php
                                    echo "<th>" .$delivered. "</th><th>".$rejected."</th><th>"."$pending"."</th><th>"."$Prepared"."</th><th>"."$Ontheway"."</th><th>".$ro["branch_name"] ."</th></tr>";

                                    }

                                    }
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



                                                                 <!-- search by OVER ALL  -->
					<div class="row">
						<div class="col-md-12">
                              <div class="card">
                                    <div class="card-header card-header-warning">
                                    <div class="col-12 makeBLack" > 
                                        <br><h4 class="card-title">Dashboard review by Over All</h4><br>
                                     </div>  
                               
                                            <form method="post" enctype="multipart/form-data">
                                                    <div class="col-sm-10 col-md-8">
                                                        <div class="form-group">
                                                            <div class="input-group m-3">
                                                                        <label class="mt-2">From :</label>&nbsp;&nbsp; 
                                                                        <input type="datetime-local" class="form-control" name="from">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </span>


                                                                            </div>&nbsp;&nbsp;<label class="mt-2">To :</label>&nbsp;&nbsp;  
                                                                            <input type="datetime-local" class="form-control"  name="to">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </span>
                                                                                </div>
                                                                                <button name="sort_list2" type="submit" class="btn btn-primary pull-center ">Get Date</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                            </form>


                                              <!-- get data  -->

                               
                                             <table class="table table-hover">
                                                        <thead>
                                                                <tr>
                                                                    <th>Total Orders</th>
                                                               
                                                                    <th>Delivered Order</th>
                                                                    <th>Rejected Orders</th>
                                                                    <th>Pending Order</th>
                                                                    
                                                                    <th>Prepared Order</th>
                                                                    <th>Ontheway Order</th>

                                                                    

                                                                    <th>Store Name</th>



                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                        if(isset($_POST["sort_list2"]) && isset($_POST["from"])&& isset($_POST["to"]))
                                        {
 
                                            $from = $_POST["from"];
                                            $to = $_POST["to"];
                                

                                            $Date2 = strstr($from,'T', true);
                                            $Date3 = strstr($to,'T', true);
                                       
            
                                              
                                              $Temp1="$Date2"." 00:00:00";
                                              $Temp2="$Date3"." 23:59:59";
                                               



                                            
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();
                                            
                                   
                                  

                           




                                            $newQ2="SELECT DISTINCT branch_code , branch_name FROM branch_store_lang ";
                                            $stmtQ2 = $db->prepare($newQ2);
                                            $stmtQ2->execute();              
                                            
                                            while($row3 = $stmtQ2->fetch(PDO::FETCH_ASSOC)) {

                                                $bcode=$row3['branch_code'];


                                             $delivered = 0;
                                             $rejected = 0;
                                             $pending = 0;
                                             $Ontheway=0;
                                             $Prepared=0;


                                                   
                                             $sqlQ23 = "select ordersMaster.order_status from   BlueFigDb.ordersMaster where branch_id='$bcode' and order_date_time BETWEEN '$Temp1' AND '$Temp2' ";
                                             $stmt23 = $db->prepare($sqlQ23);
                                              $stmt23->execute();
                                           
                                           
                                           
                          

                                               while($row23 = $stmt23->fetch(PDO::FETCH_ASSOC)) {

                                                   if($row23["order_status"] == 5)
                                                   {
                                                       $delivered++;
                                                   }
                                                   else if($row23["order_status"] == 6)
                                                   {
                                                       $rejected++;
                                                   }
                                                   else if($row23["order_status"] == 1)
                                                   {
                                                       $pending++;
                                                   }
                                                   else if($row23["order_status"] == 3)
                                                   {
                                                       $Prepared++;
                                                   }
                                                   else if($row23["order_status"] == 4)
                                                   {
                                                       $Ontheway++;
                                                   }
                                                

                                               }

                                           



                                           $sql222 = "SELECT  count(ordersMaster.order_id) as ff,ordersMaster.branch_id as branch_Id from BlueFigDb.ordersMaster where branch_id='$bcode' and order_date_time BETWEEN '$Temp1' AND '$Temp2' ";
                                           $stmt222 = $db->prepare($sql222);
                                           $stmt222->execute();
                                           $itemCount222 = $stmt222->rowCount();
                                         
                                           
                                           
                                           if ($itemCount222 > 0) {
                                            
                                             

                                               while($row222 = $stmt222->fetch(PDO::FETCH_ASSOC)) {

                                                 if($row3['branch_code'] == $row222['branch_Id']){
                                                 ?>
                                                 <tr><th>
                                                 <form action="AllOrderDescriptionByDate.php" method="GET">

                                                 <input type="hidden" value="<?php echo $row222['branch_Id'] ?>"  name="branch_Id">

                                                 <input type="hidden" value="<?php echo $Temp1 ?>"  name="from">
                                                 <input type="hidden" value="<?php echo $Temp2 ?>"  name="to">


                                                 <button type="submit"   class="btn" style="color:black:background-color:white" ><?php echo  $row222["ff"] ?></button>

                                                 </form>
                                                 </th>
                                                   <?php
                                                   echo "<th>" .$delivered. "</th><th>".$rejected."</th><th>"."$pending"."</th><th>"."$Prepared"."</th><th>"."$Ontheway"."</th><th>".$row3["branch_name"] ."</th></tr>";

                                               }

                                           }
                                         }
                               
                                      }
                                    }

                                        else{
                                            
                                            

                                              include_once  __DIR__ . '/connectionDb.php';
                                              $database = new connectionDb();
                                              $db = $database->getConnection();

                                        


                  
                                
                                            $newQ="SELECT DISTINCT branch_code , branch_name FROM branch_store_lang ";
                                            $stmtQ = $db->prepare($newQ);
                                            $stmtQ->execute();              
                                            
                                            while($row2 = $stmtQ->fetch(PDO::FETCH_ASSOC)) {

                                                $bcode=$row2['branch_code'];
                                                $delivered = 0;
                                                $rejected = 0;
                                                $pending = 0;
                                                $Ontheway=0;
                                                $Prepared=0;


                                                $sql1 = "select  ordersMaster.order_status from BlueFigDb.ordersMaster where branch_id='$bcode'";
                                                $stmt = $db->prepare($sql1);
                                                $stmt->execute();
                                                $itemCount = $stmt->rowCount();
                                              
                                              
                                              
                                              if ($itemCount  > 0) {
  
                                                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
                                                      if($row["order_status"] == 5)
                                                      {
                                                          $delivered++;
                                                      }
                                                      else if($row["order_status"] == 6)
                                                      {
                                                          $rejected++;
                                                      }
                                                      else if($row["order_status"] == 1)
                                                      {
                                                          $pending++;
                                                      }
                                                      else if($row["order_status"] == 3)
                                                      {
                                                          $Prepared++;
                                                      }
                                                      else if($row["order_status"] == 4)
                                                      {
                                                          $Ontheway++;
                                                      }
                                                   
  
                                                  }
  
                                              }






                                                $sql = "SELECT  count(ordersMaster.order_id) as ff,ordersMaster.branch_id as branch_Id from BlueFigDb.ordersMaster where branch_id='$bcode'";
                                                $stmt2 = $db->prepare($sql);
                                                $stmt2->execute();
                                                $itemCount2 = $stmt2->rowCount();
                                              
                                                
                                                
                                                if ($itemCount2 > 0) {
                                                 
                                                  

                                                    while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                                                      if($row2['branch_code'] == $row['branch_Id']){
                                                      ?>
                                                      <tr><th>
                                                      <form action="AllOrderDescriptionByDate.php" method="GET">

                                                      <input type="hidden" value="<?php echo $row['branch_Id'] ?>"  name="branch_Id">

                                                      <button type="submit"   class="btn" style="color:black:background-color:white" ><?php echo  $row["ff"] ?></button>

                                                      </form>
                                                      </th>
                                                        <?php
                                                        echo "<th>" .$delivered. "</th><th>".$rejected."</th><th>"."$pending"."</th><th>"."$Prepared"."</th><th>"."$Ontheway"."</th><th>".$row2["branch_name"] ."</th></tr>";

                                                    }

                                                }
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


</body>
</html>
