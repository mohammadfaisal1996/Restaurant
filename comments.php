<?php include('include/header.php') ?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">comments</h4>
                        
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
								<a href="FeedBack.php" >FeedBack</a>
							</li>
              <li class="separator">
								<i class=""></i>
                            </li>


        
 
          </div>
                        </ul>
                        
			
					</div><br><br>                    
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">comments table</h4><br>
                                    <input class="form-control" id="myInput7" type="text" placeholder="Search..">
                <br>
                                    </div>


                                    <div class="card-body">
                  <div class="table-responsive">
                      <table class="table">
                      <thead class=" text-secondary">
                        <th> ID</th>
                        <th> Comment</th>
                        <th>item Name</th>
  

                       
                      </thead>
                      <tbody id="myTable7">

                      <?php
                           
                            
                           include_once  __DIR__ . '/connectionDb.php';
                           $database = new connectionDb();
                           $db = $database->getConnection();
                            
                           //get , , comments,   from order 











               

                           $sql1 = "SELECT DISTINCT  orders.order_id as orderID,category_lang.category_title as ITEM_NAME  FROM `orders` LEFT JOIN order_item on order_item.order_id = orders.order_id LEFT JOIN category_lang on category_lang.category_id=order_item.item_id WHERE language_code='en'";
                           $stmt1 = $db->prepare($sql1);
                           $stmt1->execute();
                           $itemCount1 = $stmt1->rowCount();
                    
                           
                          

                         








                           $sql2 = "SELECT  DISTINCT order_id as ORDERID,orders.comments as COMMENTS ,user.user_name as USERNAME FROM `orders`  LEFT JOIN user on user.user_id=orders.user_id ";
                           $stmt = $db->prepare($sql2);
                           $stmt->execute();
                           $itemCount = $stmt->rowCount(); 

                           


                          

                           if ($itemCount > 0) {

                               while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                 while($row2 = $stmt1->fetch(PDO::FETCH_ASSOC) )
                                 {
                               
                                 ?>
                                 <tr>
                                    
                                 <td> <?php echo $row['ORDERID']?> </td>  
                                 <td><?php echo $row['COMMENTS']?></td>
                                 <td><?php 
                                
                                   if ($row['ORDERID'] == $row2['orderID']){
                                     echo $row2['ITEM_NAME'].' , ';
                                   break;
                                   }

                          
                                 ?> 
                                 </td>
                                 <tr>


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




<?php include('include/footer.php') ?>
       
               
<script>

     
$("#myInput7").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable7 tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});


</script>