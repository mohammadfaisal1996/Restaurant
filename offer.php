<?php include('include/header.php') ?>

<style>

.modal-dialog {
    max-width: 800px;
    margin: 1.75rem auto;
}
</style>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                <div class="page-header">
                        <h4 class="page-title">Offer</h4>
                        
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

                            <li class="nav-item" >
                            <a href="AddOffer.php" style="font-weight:bold;font-size:10px;background-color:rgb(255, 196, 0);color:white;font-size:12px" class="btn ">Add Offer +</a>&nbsp&nbsp
                            </li>
                        </ul>
                        
			
					</div>                   
                       
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-header card-header-warning">

                                    <div class="col-12 makeBLack" >   
                                    <br><h4 class="card-title">Offer table</h4><br>
                                    <input class="form-control mb-3" id="myInput1" type="text" placeholder="Search.."><br>

                                    </div>
                                    

       
            
                  </div>

                                    <div class="card-body">
                    <div class="table-responsive" id="order_table">
                        <table class="table" id="result2">
                      <thead class=" text-secondary">
                     
                      
                        <th>Offer type</th>
                        <th>Offer name </th>
                        <th>Offer value</th>
                        <th>Delivery Free type</th>
                        <th>Start Date </th>
                        <th>End date </th>
                         <th>Status</th>
                         <th>offer branch</th>
                        <th>action</th>

                        
                        
                      </thead>
                      <tbody  id="myTable1">
                      <?php
                          
                            
                      

             
                    
                    
                    
                    
                    
                        
                                            $s = "";
                                            $t = "";
                                            include_once  __DIR__ . '/connectionDb.php';
                                            $database = new connectionDb();
                                            $db = $database->getConnection();
                               


                                      
                        
                                            $sql = "SELECT * FROM `offer` JOIN branch_store_lang on branch_store_lang.branch_code=offer.offer_branch ";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $itemCount = $stmt->rowCount();

                                            if ($itemCount > 0) {

                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr id="D<?php echo $row['offer_id'] ?>">
                                                
                                                <td><?php  
                                                
                                                 if($row['offer_type']==1){
                                                     echo "Delivery Free ";

                                                 }elseif($row['offer_type']==2){
                                                     echo "Percent";
                                                 }
                                                
                                                ?></td>

                                                <td><?php echo $row['offerName']?></td>

                                                <td><?php echo $row['offer_price']?></td>
                                                <td><?php echo $row['Delivery_free_type']?></td>
                                                <td><?php echo $row['offer_starts_at']?></td>
                                                <td><?php echo $row['offer_ends_at']?></td>


                                                <td>
                                                <?php 
                                               if($row['offer_status'] == 0){
                                                   ?>
                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch2" onclick="Switch(<?php echo $row['offer_id'] ?>,<?php echo $row['offer_price'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch2<?php echo  $row["offer_id"]?>" tabindex="0" >
                                                    <label class="onoffswitch-label" for="myonoffswitch2<?php echo  $row["offer_id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>
                                                   <?php


                                               }else{
                                                   ?>

                                                    <div class="onoffswitch">
                                                    <input type="checkbox" name="onoffswitch2" onclick="Switch(<?php echo $row['offer_id'] ?>,<?php echo $row['offer_price'] ?>,this)" class="onoffswitch-checkbox" id="myonoffswitch2<?php echo  $row["offer_id"]?>" tabindex="0" checked>
                                                    <label class="onoffswitch-label" for="myonoffswitch2<?php echo  $row["offer_id"]?>">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                    </label>
                                                    </div>
                                                    </td>

                                                   <?php 
                                               } 
                                               ?>
                                               </td>



                                               






                                                <td><?php echo $row['branch_name']?></td>
                                                
                                                
                                                <td>


                                            

                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal<?php echo  $row['offer_id']?>">
                                                <i class="fas fa-eye fa-lg"></i>
                                                </button>

                                                  <!-- The Modal -->
                                                    <div class="modal" id="myModal<?php echo  $row['offer_id']?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Offer Details</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                         <?php 
                                                                   if($row['offer_type']==2){
                                                    //2 == parcent 

                                                    $offer_id=$row['offer_id'];
                                                    $sqlOFFER="SELECT DISTINCT `category_id` FROM `ItemOFFER` where offerID=$offer_id ";

                                                 
                                                

                                                    $stmtOFFER = $db->prepare($sqlOFFER );
                                                    $stmtOFFER ->execute();
                                                    $itemCountOFFER  = $stmtOFFER ->rowCount();
        
                                                    if ($itemCountOFFER  > 0) {
                                                     
        
                                                    while($rowOFFER  = $stmtOFFER ->fetch(PDO::FETCH_ASSOC)) {
                                                      

                                                         if(!empty($rowOFFER['category_id'])&& $rowOFFER['category_id'] != NULL ){
                                                            //category....
                                                            $category_id=$rowOFFER['category_id'];

                                                            ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php $time=time(); echo $time ?>" aria-expanded="false" aria-controls="collapseOne">
                                                                    
                                                                    <?php 
                                                                    $GETIMAGE ="SELECT  category_lang.category_title,category_items_list.category_image as ImageName from category_items_list JOIN category_lang  on category_lang.category_id = category_items_list.category_id where  category_items_list.category_id=$category_id"; 
                                                                    $getimagestm = $db->prepare($GETIMAGE );
                                                                    $getimagestm ->execute();
                                                                    $rowimage  = $getimagestm ->fetch(PDO::FETCH_ASSOC);
                                                                    echo "<img class='mr-5' src=https://dashboard.bluefig.digisolapps.com/uploads/images/imagesitems/".$rowimage['ImageName']." width=75 height=75 />";
                                                                    echo $rowimage['category_title'];




                                                                    
                                                                    ?>
                                                                    </button>
                                                                </h5>
                                                                </div>

                                                                <div id="collapseOne<?php echo $time ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">

                                                                <table class="table ">
                                                                <thead class=" text-secondary ">
                                                                <th>Item ID</th>
                                                                <th>Item Image</th>
                                                                <th>Item Name</th>
                                                                <th>Item Price</th>
                                                                

                                                                </thead>

                                                                <tbody>
                                                                
                                                            


                                                            <?php
                                                         
                                                            $sqlOFFERCAT ="SELECT 
                                                            category_items_list.category_id,
                                                            category_items_list.ShowINslider,
                     
                                                            category_items_list.BranchesID,
                                                            category_items_list.IsSizes,
                                                           
                                                            category_items_list.Deliveryfree,
                     
                                 
                                                            
                                                            category_items_list.item_price,
                                                             category_lang.category_title,
                                                             
                                                             category_items_list.category_image as ImageName 
                                                             
                                                              from item_mapping 
                                                              JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                                              JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                                              
                                                              where cat_id=$category_id ";

                                                             
                                                            $stmtOFFERCAt = $db->prepare($sqlOFFERCAT );
                                                            $stmtOFFERCAt ->execute();

                                                            while($itemsOFFERCAT  = $stmtOFFERCAt ->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>



                                                                <tr id="D<?php echo $itemsOFFERCAT["category_id"] ?>">
       



                                                                <?php
                                                                  echo "<th> " . $itemsOFFERCAT["category_id"]. "</th><th onclick=\"getID(".$itemsOFFERCAT["category_id"].")\">";?> 
                                                                  
                                                                  
                                                                  <a href='ItemDesc.php?category_id=<?php echo $itemsOFFERCAT["category_id"] ?>'>
                                                                  <?php 
                                                                  echo "<img src=https://dashboard.bluefig.digisolapps.com/uploads/images/imagesitems/".$itemsOFFERCAT['ImageName']." width='75' height='75 />" . "</a></th><th>"
                                                                . $itemsOFFERCAT["category_title"]. "</th>"?>
                                                                
                                                                
                                                                 <?php
                                                                 
                                                                 if($itemsOFFERCAT['IsSizes'] == 1){
                    
                                                                  $IDD=$itemsOFFERCAT['category_id'];
                    
                                                                  $sqlDD="SELECT  `type` FROM `ItemType` WHERE category_id=$IDD";
                                                                  $stmtDD = $db->prepare($sqlDD);
                                                                  $stmtDD->execute();
                    
                                                                  $sqlDD2="SELECT  `price` FROM `ItemType` WHERE category_id=$IDD";
                                                                  $stmtDD2 = $db->prepare($sqlDD2);
                                                                  $stmtDD2->execute();
                    
                                                                  echo " <td><table>";
                    
                                                                  while($rowSize=$stmtDD->fetch(PDO::FETCH_ASSOC)){
                                                                   ?>
                                                                <th><?php echo $rowSize['type']?></th>         
                                                                <?php
                                                                  }
                                                                  echo "<tr>";
                    
                                                                  while($rowSize2=$stmtDD2->fetch(PDO::FETCH_ASSOC)){
                                                                    ?>
                                                                    <td><?php echo $rowSize2["price"]?>JOD</td>
                            
                                                                 <?php
                                                                   }
                                                                   echo "</tr>";
                    
                                                                 echo "</table> </td>"; 
                                                                 }else{
                    
                                                                 echo "<td>".$itemsOFFERCAT['item_price']."JOD</td>";
                                                               
                                                                }
                                                                 
                                                                 
                                                                 ?>
                                                                 </tr>


                                                               
                                                            <?php
                                                            }
                                                            ?>


                                                            </tbody>
                                                            </table>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <?php
                                                

                                                            

 

                                                
                                                         }else{?>
                                                     
                                                     <table class="table ">
                                                                <thead class=" text-secondary ">
                                                                <th>Item ID</th>
                                                                <th>Item Image</th>
                                                                <th>Item Name</th>
                                                                <th>Item Price</th>
                                                                

                                                                </thead>

                                                                <tbody>
                                                           <?php

                                                         
                                                            
                                                            $sqlOFFERITEM="SELECT DISTINCT `itemid` FROM `ItemOFFER` where offerID=$offer_id ";
        
                                                         
                                                         
                                                            $stmtOFFERITEM = $db->prepare($sqlOFFERITEM );
                                                            $stmtOFFERITEM ->execute();
                                                            $itemCountOFFERITEM  = $stmtOFFERITEM ->rowCount();
                
                                                            if ($itemCountOFFERITEM  > 0) {
                                                             
                
                                                            while($rowOFFERitem  = $stmtOFFERITEM ->fetch(PDO::FETCH_ASSOC)) {
                                                                $item=$rowOFFERitem['itemid'];
                                                                ?>




                                                        
                                                                
                                                                
                                                            


                                                            <?php
                                                             
                                                            $sqlOFFERCAT2 ="SELECT 
                                                            category_items_list.category_id,
                                                            
                     
                                                            category_items_list.BranchesID,
                                                            category_items_list.IsSizes,
                                                          
                                                            category_items_list.Deliveryfree,
                     
                                 
                                                            
                                                            category_items_list.item_price,
                                                             category_lang.category_title,
                                                           
                                                             category_items_list.category_image as ImageName 
                                                             
                                                              from item_mapping 
                                                              JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                                              JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                                              
                                                              where category_items_list.category_id=$item ";

                                                             
                                                            $stmtOFFERCAt2 = $db->prepare($sqlOFFERCAT2);
                                                            $stmtOFFERCAt2 ->execute();

                                                            while($itemsOFFERCAT  = $stmtOFFERCAt2->fetch(PDO::FETCH_ASSOC)) {
                                                              ?>

                                                                  
                                                             <tr id="D<?php echo $itemsOFFERCAT["category_id"] ?>">
       



                                                                <?php
                                                                  echo "<th> " . $itemsOFFERCAT["category_id"]. "</th><th onclick=\"getID(".$itemsOFFERCAT["category_id"].")\">";?> 
                                                                  
                                                                  
                                                               
                                                                  <?php 
                                                                  echo "<img src=https://dashboard.bluefig.digisolapps.com/uploads/images/imagesitems/".$itemsOFFERCAT['ImageName']." width='75' height='75' />" . "</a></th><th>"
                                                                . $itemsOFFERCAT["category_title"]. "</th>"?>
                                                                
                                                                
                                                                 <?php
                                                                 
                                                                 if($itemsOFFERCAT['IsSizes'] == 1){
                    
                                                                  $IDD=$itemsOFFERCAT['category_id'];
                    
                                                                  $sqlDD="SELECT  `type` FROM `ItemType` WHERE category_id=$IDD";
                                                                  $stmtDD = $db->prepare($sqlDD);
                                                                  $stmtDD->execute();
                    
                                                                  $sqlDD2="SELECT  `price` FROM `ItemType` WHERE category_id=$IDD";
                                                                  $stmtDD2 = $db->prepare($sqlDD2);
                                                                  $stmtDD2->execute();
                    
                                                                  echo " <td><table>";
                    
                                                                  while($rowSize=$stmtDD->fetch(PDO::FETCH_ASSOC)){
                                                                   ?>
                                                                <th><?php echo $rowSize['type']?></th>         
                                                                <?php
                                                                  }
                                                                  echo "<tr>";
                    
                                                                  while($rowSize2=$stmtDD2->fetch(PDO::FETCH_ASSOC)){
                                                                    ?>
                                                                    <td><?php echo $rowSize2["price"]?>JOD</td>
                            
                                                                 <?php
                                                                   }
                                                                   echo "</tr>";
                    
                                                                 echo "</table> </td>"; 
                                                                 }else{
                    
                                                                 echo "<td>".$itemsOFFERCAT['item_price']."JOD</td>";
                                                               
                                                                }
                                                                 
                                                                 
                                                                 ?>
                                                                 </tr>
                                                                


                                                               
                                                            <?php
                                                            }
                                                            ?>


                                                      
 

                    
                                                            <?php


                                                            }

                                                            ?>

                                                            </tbody>
                                                            </table>


                                                            <?php


                                                          }
                                                         }



                                                      }
                                                    }


                                                }elseif($row['offer_type']==1){
                                                     // 1 == delivery




                                                    $offer_id=$row['offer_id'];
                                                    $sqlOFFER="SELECT DISTINCT `category_id` FROM `ItemOFFER` where offerID=$offer_id ";

                                                 
                                                

                                                    $stmtOFFER = $db->prepare($sqlOFFER );
                                                    $stmtOFFER ->execute();
                                                    $itemCountOFFER  = $stmtOFFER ->rowCount();
        
                                                    if ($itemCountOFFER  > 0) {
                                                     
        
                                                    while($rowOFFER  = $stmtOFFER ->fetch(PDO::FETCH_ASSOC)) {
                                                      

                                                         if(!empty($rowOFFER['category_id'])&& $rowOFFER['category_id'] != NULL ){
                                                            //category....
                                                            $category_id=$rowOFFER['category_id'];

                                                            ?>
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                <h5 class="mb-0">
                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php $time2=date("s"); echo $time2?>" aria-expanded="false" aria-controls="collapseOne">
                                                                    <?php 
                                                                    $GETIMAGE2 ="SELECT  category_lang.category_title,category_items_list.category_image as ImageName from category_items_list JOIN category_lang  on category_lang.category_id = category_items_list.category_id where  category_items_list.category_id=$category_id"; 
                                                                    $getimagestm2 = $db->prepare($GETIMAGE2 );
                                                                    $getimagestm2 ->execute();
                                                                    $rowimage2  = $getimagestm2 ->fetch(PDO::FETCH_ASSOC);
                                                                    echo "<img class='mr-5' src=https://dashboard.bluefig.digisolapps.com/uploads/images/imagesitems/".$rowimage2['ImageName']." width='75' height='75' />";
                                                                    echo $rowimage2['category_title'];




                                                                    
                                                                    ?>
                                                                    </button>
                                                                </h5>
                                                                </div>

                                                                <div id="collapseOne<?php echo $time2 ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body">

                                                                <table class="table ">
                                                                <thead class=" text-secondary ">
                                                                <th>Item ID</th>
                                                                <th>Item Image</th>
                                                                <th>Item Name</th>
                                                                <th>Delivery Free type	</th>
                                                                

                                                                </thead>

                                                                <tbody>
                                                                
                                                            


                                                            <?php

                                                            $sqlOFFERCAT ="SELECT 
                                                            category_items_list.category_id,
                                                           
                     
                                                            category_items_list.BranchesID,
                                                         
                                                            
                                                            category_items_list.Deliveryfree,
                     
                                 
                                                            
                                                         
                                                             category_lang.category_title,
                                                             
                                                             category_items_list.category_image as ImageName 
                                                             
                                                              from item_mapping 
                                                              JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                                              JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                                              
                                                              where cat_id=$category_id ";

                                                             
                                                            $stmtOFFERCAt = $db->prepare($sqlOFFERCAT );
                                                            $stmtOFFERCAt ->execute();

                                                            while($itemsOFFERCAT  = $stmtOFFERCAt ->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>



                                                                <tr id="D<?php echo $itemsOFFERCAT["category_id"] ?>">
       



                                                                <?php
                                                                  echo "<th> " . $itemsOFFERCAT["category_id"]. "</th><th onclick=\"getID(".$itemsOFFERCAT["category_id"].")\">";?> 
                                                                  
                                                                  
                                                                  <a href='ItemDesc.php?category_id=<?php echo $itemsOFFERCAT["category_id"] ?>'>
                                                                  <?php 
                                                                  echo "<img src=https://dashboard.bluefig.digisolapps.com/uploads/images/imagesitems/".$itemsOFFERCAT['ImageName']."width='75' height='75' />" . "</a></th><th>"
                                                                . $itemsOFFERCAT["category_title"]. "</th>"?>
                                                                
                                                                 <th><?php echo $itemsOFFERCAT['Deliveryfree'] ?></th>
                                                                  
                                                                 </tr>


                                                               
                                                            <?php
                                                            }
                                                            ?>


                                                            </tbody>
                                                            </table>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <?php
                                                

                                                            

 

                                                
                                                         }else{?>
                                                     
                                                     <table class="table ">
                                                                <thead class=" text-secondary ">
                                                                <th>Item ID</th>
                                                                <th>Item Image</th>
                                                                <th>Item Name</th>
                                                                <th>Delivery Free type</th>
                                                                

                                                                </thead>

                                                                <tbody>
                                                           <?php

                                                            
                                                            $sqlOFFERITEM="SELECT DISTINCT `itemid` FROM `ItemOFFER` where offerID=$offer_id ";
        
                                                         
                                                         
                                                            $stmtOFFERITEM = $db->prepare($sqlOFFERITEM );
                                                            $stmtOFFERITEM ->execute();
                                                            $itemCountOFFERITEM  = $stmtOFFERITEM ->rowCount();
                
                                                            if ($itemCountOFFERITEM  > 0) {
                                                             
                
                                                            while($rowOFFERitem  = $stmtOFFERITEM ->fetch(PDO::FETCH_ASSOC)) {
                                                                $item=$rowOFFERitem['itemid'];
                                                                ?>




                                                        
                                                                
                                                                
                                                            


                                                            <?php
                                                             
                                                            $sqlOFFERCAT2 ="SELECT 
                                                            category_items_list.category_id,
                                                            category_items_list.ShowINslider,
                     
                                                            category_items_list.BranchesID,
                                                            category_items_list.IsSizes,
                                                            category_items_list.Status,
                                                            category_items_list.Deliveryfree,
                     
                                 
                                                            
                                                            category_items_list.item_price,
                                                             category_lang.category_title,
                                                             category_lang.Ingredients as Description,
                                                             category_items_list.category_image as ImageName 
                                                             
                                                              from item_mapping 
                                                              JOIN category_items_list on category_items_list.category_id=item_mapping.item_id 
                                                              JOIN category_lang  on category_lang.category_id = category_items_list.category_id
                                                              
                                                              where category_items_list.category_id=$item ";

                                                             
                                                            $stmtOFFERCAt2 = $db->prepare($sqlOFFERCAT2);
                                                            $stmtOFFERCAt2 ->execute();

                                                            while($itemsOFFERCAT  = $stmtOFFERCAt2->fetch(PDO::FETCH_ASSOC)) {
                                                              ?>

                                                                  
                                                             <tr id="D<?php echo $itemsOFFERCAT["category_id"] ?>">
       



                                                                <?php
                                                                  echo "<th> " . $itemsOFFERCAT["category_id"]. "</th><th onclick=\"getID(".$itemsOFFERCAT["category_id"].")\">";?> 
                                                                  
                                                                  
                                                                  <a href='ItemDesc.php?category_id=<?php echo $itemsOFFERCAT["category_id"] ?>'>
                                                                  <?php 
                                                                  echo "<img src=https://dashboard.bluefig.digisolapps.com/uploads/images/imagesitems/".$itemsOFFERCAT['ImageName']."width='75' height='75' />" . "</a></th><th>"
                                                                . $itemsOFFERCAT["category_title"]. "</th>"?>
                                                                
                                                                
                                                                <th><?php echo $itemsOFFERCAT['Deliveryfree'] ?></th>

                                                                 </tr>
                                                                


                                                               
                                                            <?php
                                                            }
                                                            ?>


                                                      
 

                    
                                                            <?php


                                                            }

                                                            ?>

                                                            </tbody>
                                                            </table>


                                                            <?php


                                                          }
                                                         }



                                                      }
                                                    }
                                                      









 


                                                }
                                                
                                                
                                                
                                                ?>
                                                         
                                                         
                                                         
                                                        



                                          

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>





                                                <form  action="updateOFFER.php" style="display: inline-block !important;">
                                              
                                                <input type="hidden" name="offer_id" value="<?php echo $row['offer_id'];  ?>">
                                                <input type="hidden" name="offer_branch" value="<?php echo $row['offer_branch'];  ?>">
                                                <input type="hidden" name="branch_name" value="<?php echo $row['branch_name'];  ?>">
                                                <input type="hidden" name="FromDate" value="<?php echo $row['offer_starts_at'];  ?>">
                                                <input type="hidden" name="ToDate" value="<?php echo $row['offer_ends_at'];  ?>">



                                                

                                                <button class="btn btn-primary" id="updateCat"  ><i class="fas fa-pencil-alt"></i></button>
                                                </form>



                                                <form onsubmit="return false" style="    display: inline-block !important;">
                                                <button class="btn btn-danger" id="DeleteCat" onsubmit="return false"  onclick="funn(<?php echo $row['offer_id'] ?>,<?php if(!empty($row['Delivery_free_type'])) {   echo 1 ;}else{ echo 0;} ?>)"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                                </td>


                                                </tr>
                                     
                                    
                                               <?php
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

function  funn(name,Delivery_free_type){
    
    swal({
  title: "Are you sure?",
  text: "It will permanently deleted!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    iDCat=name;


$.ajax({
     type: "POST",
     url:"DeleteOffer.php",
     data:{Delete:iDCat,Delivery_free_type:Delivery_free_type}, // serializes the form's elements.
     success: function(data)
     {
           


         $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
     }
   }).then(function(){

              swal("This record has been deleted.!", {
              icon: "success",
              });
        });




  } 
});















}


function Switch(OFFERID,discount,checkbox)
{


    if (checkbox.checked)
    {
   
      $.ajax({
            type: "POST",
            url:"updateOFFERSW.php",
            data:{OFFERID:OFFERID,discount:discount,status:1}, // serializes the form's elements.
            success: function(data)
            {
                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
                console.log(data);
            }
          });
    }else{
   


      $.ajax({
            type: "POST",
            url:"updateOFFERSW.php",
            data:{OFFERID:OFFERID,discount:discount,status:0}, // serializes the form's elements.
            success: function(data)
            { 
                   console.log(data);
        
                // $("#D"+iDCat).fadeOut("slow"); // show response from the php script.
            }
          });
    }
}
</script>