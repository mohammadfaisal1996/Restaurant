<?php include('include/header.php') ?>
<?php

$baseUrl = new addImage("file","images/imagesitems/");
?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    
                    <div class="page-header">
                        <h4 class="page-title">Reports</h4>
                        
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
                            <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                            </li>

                     
                        </ul>
                        
			
					</div>                   



            <div class="row">
                    <div class="offset-md-3 col-sm-12 col-md-6">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                                <div class="col-12 makeBLack" >   
                                                    <br><h4 class="card-title " >Reports</h4><br>
                                            
                                                    <br>
                                                </div>
                                                        <div class="p-4 col-lg-12  col-md-8   col-sm-12">
                                                                <select id="type_of_report" class="form-control" onchange="getReport(this)">
                                                                <option value="Items">Selete Report Type</option>

                                                                <option value="Items">About Items</option>
                                                                <option value="Category">About Category</option>
                                                                <option value="Customer">About Customer</option>

                                                                </select>
                                                        
                                                        </div>    

                                        </div>




                                    </div>
                                </div>
                           </div>







    
    
                    </div>
   



                        <div id="CustomerReport" style="display:none" >
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                        <div class="card-header card-header-warning">




                                                                                <div class="row">

                                                                                                <div class="col-3" >   
                                                                                                <h4 class="card-title" style="background-color:black">Report Customer <br>Most  Customer Order</h4>
                                                                                                </div>

                                                                                                            
                                                                                                <div class="offset-6 col-3">
                                                                                                <form method="post" action="DownloadReportExcel.php" >
                                                                                                    <input type="hidden" name ="excel"  value="customer-order">
                                                                                                    <button type="submit" class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff"><i class="fas fa-file-excel fa-3x"></i></button></i>
                                                                                                </form>

                                                                                            
                                                                                                </div>

                                                    
                                                            
                                                                                    </div>


                                                                                            <div class="card-body" >

                                                                                            <div class="table-responsive" id="order_table">


                                                                                            <table class="table " id="result2">
                                                                                                <thead class=" thead-dark text-secondary">
                                                                                                
                                                                                            
                                                                                                <th>Mobile Number</th>
                                                                                                <th>Count Of Order</th>
                                                                                            
                                                                                                

                                                                                                

                                                                                                
                                                                                                
                                                                                                </thead>
                                                                                                <tbody  id="myTable1">
                                                                                                <?php
                                                                                        
                                                                                        
                                                                                    








                                                                                                        $s = "";
                                                                                                        $t = "";
                                                                                                        include_once  __DIR__ . '/connectionDb.php';
                                                                                                        $database = new connectionDb();
                                                                                                        $db = $database->getConnection();
                                                                                            

                                                                                                    
                                                                                    
                                                                                                        $sql = "select ordersMaster.mobile_number,count(ordersMaster.mobile_number) as CountOfOrder from ordersMaster   GROUP by mobile_number";
                                                                                                        $stmt = $db->prepare($sql);
                                                                                                        $stmt->execute();
                                                                                                        $itemCount = $stmt->rowCount();

                                                                                                        if ($itemCount > 0) {

                                                                                                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                                                                                                                echo "<tr><td>".$row['mobile_number']."</td><td>".$row['CountOfOrder']."</td></tr>";
                                                                                                                
                                                                                                    
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


                                    <div id="CategoryReport"  style="display:none" >
                    <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                        <div class="card-header card-header-warning">
                                        <div class="row">

                                            <div class="col-3" >   
                                            <h4 class="card-title" style="background-color:black">Report Category<br>Most Selling From Category </h4>
                                            </div>
                                            <div class="offset-6 col-3">
                                              <form method="post" action="DownloadReportExcel.php" >
                                            <input type="hidden" name ="excel"  value="category-order">
                                            <button type="submit" class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff"><i class="fas fa-file-excel fa-3x"></i></button></i>
                                        </form>
                                            </div>

            
                    
                                            </div>


                                            <div class="card-body" >
                                            <div class="table-responsive" id="order_table">


                                            <table class="table " id="result2">
                                                <thead class=" thead-dark text-secondary">
                                                
                                                
                                                <th>Category Name</th>
                                                <th>Number Of Order From Category</th>
                                                
                                                

                                                

                                                
                                                
                                                </thead>
                                                <tbody  id="myTable1">
                                                <?php
                                        
                                        
                                    









                                                        $s = "";
                                                        $t = "";
                                                        include_once  __DIR__ . '/connectionDb.php';
                                                        $database = new connectionDb();
                                                        $db = $database->getConnection();
                                            

                                                    
                                    
                                                        $sql = "SELECT category_lang.category_title,count(order_item.order_id) as orderNumber from category_lang,category_items_list,order_item  WHERE category_items_list.category_master=category_lang.category_id and order_item.item_id=category_items_list.category_id GROUP by category_lang.category_title";
                                                        $stmt = $db->prepare($sql);
                                                        $stmt->execute();
                                                        $itemCount = $stmt->rowCount();

                                                        if ($itemCount > 0) {

                                                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                                                                echo "<tr><th>"
                                                                . $row["category_title"]. "</th><th>".$row["orderNumber"]."</th></tr>";
                                                                
                                                    
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

                        <div id="ItemReport"  style="display:none" >
                    <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                        <div class="card-header card-header-warning">
                                        <div class="row">

                                           <div class="col-3">   
                                        <h4 class="card-title" style="background-color:black">Report Item<br>Most Selling Item </h4>
                                        </div>
                                        <div class="offset-6 col-3">
                                        <form method="post" action="DownloadReportExcel.php">
                                            <input type="hidden" name="excel" value="item-Order">
                                            <button type="submit" class="btn mb-4 pull-right" style="color: #282a3c;margin-right: 10px;border:none;background-color:#fff"><i class="fas fa-file-excel fa-3x"></i></button>
                                        </form>

                               
                                        </div>


            
                    
                                            </div>


                                            <div class="card-body" >
                                            <div class="table-responsive" id="order_table">


                                            <table class="table " id="result2">
                                                <thead class=" thead-dark text-secondary">
                                                
                                                
                                              <tr><th calss="makeBLack">Item image</th>
                                            <th>Item Name</th>
                                            <th>Item Price</th>
                                            <th>Number Of Order</th>
                                            <th>quantity Of Order</th>
                                            

                                            

                                            
                                            
                                            </tr>
                                                
                                                

                                                

                                                
                                                
                                                </thead>
                                                <tbody  id="myTable1">
                                                <?php
                                        
                                        
                                    






                                                        $s = "";
                                                        $t = "";
                                                        include_once  __DIR__ . '/connectionDb.php';
                                                        $database = new connectionDb();
                                                        $db = $database->getConnection();
                                            

                                                    
                                    
                                                        $sql = "SELECT (select category_lang.category_title from category_lang where category_lang.category_id=category_items_list.category_id) as item_name ,category_items_list.category_image,count(item_id) as ItemCount ,category_items_list.item_price,sum(quantity) as order_item_quantity FROM order_item,category_items_list WHERE category_items_list.category_id=order_item.item_id GROUP by order_item.item_id order by order_item.item_id asc";
                                                        $stmt = $db->prepare($sql);
                                                        $stmt->execute();
                                                        $itemCount = $stmt->rowCount();

                                                        if ($itemCount > 0) {

                                                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                                                                echo "<tr><th><img src='",$baseUrl->getBaseUrl().$row['category_image'],"' width='75' height='75' /></th><th>"
                                                                . $row["item_name"]. "</th><th>".$row["item_price"]."</th><th>".$row["ItemCount"]."</th><th>".$row["order_item_quantity"]."</th></tr>";
                                                                
                                                    
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

 function getReport(Report){

    var report=Report.value;


    if(report == "Items" ){
         $("#ItemReport").show();
    $("#CategoryReport").hide();
    $("#CustomerReport").hide();

    }else if(report == "Category"){

    $("#CategoryReport").show();
    $("#CustomerReport").hide();
     $("#ItemReport").hide();

    }else if(report == "Customer"){
   
    $("#CustomerReport").show();
     $("#ItemReport").hide();
     $("#CategoryReport").hide();
    }




}


</script>